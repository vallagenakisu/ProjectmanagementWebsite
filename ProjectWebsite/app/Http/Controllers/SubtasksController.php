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
        $sub->card_id = $card->id;
        $sub->save();
        if($sub)
        {
            return redirect()->route('subcards',[$user->id,$card->id])->with("success" , "Card is created successfully");
        }
    }
    public function createChildren(Request $request , User $user , Cards $card , SubTasks $subtask)
    {

        $request->validate
        (
            [
            'title' => 'required',
            'assigned' => 'required',
            ]
        );
        $sub = new SubTasks();
        $sub->title = $request->input('title');
        $sub->adminName = $request->input('assigned');
        $sub->card_id = $card->id;
        $sub->parent_id = $subtask->id;
        $sub->save();
        if($sub)
        {
            return redirect()->route('subcards',[$user->id,$card->id])->with("success" , "Card is created successfully");
        }
        return redirect()->route('login')->with("error" , "Card is not created successfully");
    }
    public function getsubtasks(User $user , Cards $card)
    {
        //$subtasks = SubTasks::root()->get();
        $subtasks = SubTasks::tree()->get()->toTree();

        return view('sub-task-dashboard',
        [
            'user' => $user,
            'card' => $card,
            'sub_tasks' => $subtasks
        ]);
    }
}
