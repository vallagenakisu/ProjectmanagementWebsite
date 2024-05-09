<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\SubTasks;
use App\Models\User;
use Illuminate\Http\Request;

class SubtasksController extends Controller
{
    public function create(Request $request , User $user , Cards $card)
    {
        $request->validate
        (
            [
            'title' => 'required',
            'assigned' => 'required',
            ]
        );
        $sub = new SubTasks();
        $sub->title = $request->title;
        $sub->adminName = $request->assigned;
        $sub->save();
        if($sub)
        {
            return redirect()->route('subcards',[$user->id,$card->id])->with("success" , "Card is created successfully");
        }
    }
}
