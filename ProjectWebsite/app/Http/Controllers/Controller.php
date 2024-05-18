<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function user(User $user)
    {
        return view('user',[
            'user' => $user
        ]);
    }
    public function visit(User $user, User $friends)
    {
        return view('visit',[
            'user' => $user,
            'friends' => $friends
        ]);
    }
    public function notification(User $user)
    {
        return view('notification',[
            'user' => $user
        ]);
    }
}
