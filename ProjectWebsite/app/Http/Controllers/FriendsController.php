<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\User;
use App\Models\User;

class FriendsController extends Controller
{
    public function index(User $user , Request $request)
    {
        $search = $request['search'];
        if($search =="")
        {
            $users = User::all()->except($user->id);
        }
        else 
        {
            $users = User::where('name', 'like', '%'.$search.'%')->get();
        }
        return view('friends', [
            'users' => $users, 
            'user' => $user,
        ]);
    }
    public function addFriend(User $user, User $friend)
    {
        $user->friends()->attach($friend->id);
        return back();
    }
    public function removeFriend(User $user, User $friend)
    {
        $user->friends()->detach($friend->id);
        return back();
    }
    public function myfriends(User $user)
    {
        $users = $user->friends;
        return view('friendlist', [
            'users' => $users,
            'user' => $user,
        ]);
    }
}
