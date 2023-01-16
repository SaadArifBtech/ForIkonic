<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequest;
use App\Models\Friend;


class FriendRequestController extends Controller
{
    //
    public function viewRequests()
    {
        $friendRequests = FriendRequest::where('request_id', Auth::id())->get();
        return view('friend_requests.index', compact('friendRequests'));
    }

    public function cancelRequest($id)
    {
        $friendRequest = FriendRequest::where('user_id', Auth::id())
            ->where('request_id', $id)
            ->first();
        if(!$friendRequest) return redirect()->back()->with('message', 'Friend request not found.');
        $friendRequest->delete();
        return redirect()->back()->with('message', 'Friend request canceled.');
    }
}
