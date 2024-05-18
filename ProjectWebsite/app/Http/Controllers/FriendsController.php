<?php

namespace App\Http\Controllers;


use App\Models\User;
//use Illuminate\Foundation\Auth\User;
use App\Notifications\Added;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;

class FriendsController extends Controller
{
    use Notifiable;
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
        Notification::send($friend, new Added($user->name));
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
