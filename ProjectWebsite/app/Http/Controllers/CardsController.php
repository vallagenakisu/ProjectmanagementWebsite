<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\User;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function form(User $user)
    {
        return view('ProjectForm',[
            'user' => $user
        
        ]);
    }
    public function index()
    {
        // $users = User::all();

        return view('dashboard',[
            
        
        ]);
    }
    public function create(Request $request , User $user)
    {
        $request->validate
        (
            [
            'title' => 'required',
            ]
        );
        $cards = new Cards();
        $cards->title = $request->title;
        // $cards->adminName = $request->assigned;
        $cards->user_id = $user->id;
        $cards->save();
        if($cards)
        {
            return redirect()->route('getcards',$user->id)->with("success" , "Card is created successfully");
        }
        else 
        return redirect()->route('dashboard')->with("error" , "Card is not created successfully");
    }
    public function getcards(User $user)
    {

        $cards = Cards::all();
        return view('dashboard',[
            'user' => $user,
            'cards' => $cards
        ]);
    }
    public function subcards(User $user , Cards $card)
    {
        // $userCard = Cards::where('user_id',$user->id)->get();
        // dd($user);
        return view('sub-task-dashboard',[
            'user' => $user,
            'card'=> $card
        ]);
    }
}
