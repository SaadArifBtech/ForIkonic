<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Connection;

class ConnectionsController extends Controller
{
    //

    public function connect($id)
    {
        // check if connection already exists
        $connection = Connection::where('user_id', Auth::id())
            ->where('connected_user_id', $id)
            ->first();
        if($connection) return redirect()->back()->with('message', 'Connection already exists.');

        // create new connection
        $connection = new Connection;
        $connection->user_id = Auth::id();
        $connection->connected_user_id = $id;
        $connection->save();
        return redirect()->back()->with('message', 'Connection created!');
    }

    public function disconnect($id)
    {
        $connection = Connection::where('user_id', Auth::id())
            ->where('connected_user_id', $id)
            ->first();
        if(!$connection) return redirect()->back()->with('message', 'Connection not found.');
        $connection->delete();
        return redirect()->back()->with('message', 'Connection removed.');
    }
}
