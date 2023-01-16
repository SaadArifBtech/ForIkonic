<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\Friend;
use Illuminate\Http\Request;
use Auth;

class FriendController extends Controller
{
    //
    public function index()
    {
        $friends = Auth::user()->friends;
        return view('friends', ['friends' => $friends]);
    }
    public function sendRequest($id)
    {
        // check if request already sent
        $request = FriendRequest::where('user_id', Auth::id())
            ->where('request_id', $id)
            ->first();
        if($request) return redirect()->back()->with('message', 'Friend request already sent.');

        // check if user is already a friend
        $friend = Friend::where('user_id', Auth::id())
            ->where('friend_id', $id)
            ->orWhere('user_id', $id)
            ->where('friend_id', Auth::id())
            ->first();
        if($friend) return redirect()->back()->with('message', 'User is already your friend.');

        // create friend request
        $friendRequest = new FriendRequest;
        $friendRequest->user_id = Auth::id();
        $friendRequest->request_id = $id;
        $friendRequest->save();
        return redirect()->back()->with('message', 'Friend request sent!');
    }

    public function acceptRequest($id)
    {
        // check if request exists
        $friendRequest = FriendRequest::find($id);
        if(!$friendRequest) return redirect()->back()->with('message', 'Friend request not found.');

        // create friend connection
        $friend = new Friend;
        $friend->user_id = $friendRequest->user_id;
        $friend->friend_id = $friendRequest->request_id;
        $friend->save();

        // delete friend request
        $friendRequest->delete();

        return redirect()->back()->with('message', 'Friend request accepted!');
    }

    public function declineRequest($id)
    {
        // check if request exists
        $friendRequest = FriendRequest::find($id);
        if(!$friendRequest) return redirect()->back()->with('message', 'Friend request not found.');

        // delete friend request
        $friendRequest->delete();
        return redirect()->back()->with('message', 'Friend request declined.');
    }

    public function removeFriend($id)
    {
        $friend = Friend::where('user_id', Auth::id())
            ->where('friend_id', $id)
            ->orWhere('user_id', $id)
            ->where('friend_id', Auth::id())
            ->first();
        if(!$friend) return redirect()->back()->with('message', 'Friend not found.');
        $friend->delete();
        return redirect()->back()->with('message', 'Friend removed.');
    }
}
