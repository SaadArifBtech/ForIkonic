<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequest;
use App\Models\Friend;
use App\Models\Suggestion;

class SuggestionController extends Controller
{
    //
    public function index()
    {
        $suggestedUsers = Suggestion::where('status', 1)->get();
        return  view('suggestion', compact('suggestedUsers'));
    }
}
