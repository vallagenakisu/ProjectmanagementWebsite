<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cards;
use App\Models\SubTasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SubTasks as NotificationsSubTasks;

class SubtasksController extends Controller
{
    // $users = User::where('name', 'like', '%'.$search.'%')->get();
    public function create(Request $request , User $user , Cards $card)
    {
        $finduser = User::where('email',$request->assigned)->first();
        if($finduser == null)
        {
            return redirect()->route('subcards',[$user->id,$card->id])->with("error" , "User not found");
        }
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
        $sub->user_id = $finduser->id;
        Notification::send($finduser, new NotificationsSubTasks([$user->name,$card->title,$sub->title]));
        $sub->save();
        if($sub)
        {
            return redirect()->route('subcards',[$user->id,$card->id])->with("success" , "Card is created successfully");
        }
    }
    public function createChildren(Request $request , User $user , Cards $card ,SubTasks $subtask)
    {

        $finduser = User::where('email',$request->assigned)->first();
        if($finduser == null)
        {
            return redirect()->route('subtaskeach',[$user->id,$card->id,$subtask->id])->with("error" , "User not found");
        }
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
        $subtask->no_child++;
        $sub->user_id = $finduser->id;
        $subtask->save(); 
        $sub->save();
        if($sub)
        {
            return redirect()->route('subtaskeach',[$user->id,$card->id,$subtask->id])->with("success" , "Card is created successfully");
        }
        return redirect()->route('login')->with("error" , "Card is not created successfully");
    }
    public function getsubtasks(User $user , Cards $card)
    {
        $subtasks = SubTasks::tree()->get()->toTree();
        foreach($subtasks as $item)
        {
            if($item->completion == $item->no_child)
            {
                $item->status = true;
            }
        }
        return view('sub-task-dashboard',
        [
            'user' => $user,
            'card' => $card,
            'sub_tasks' => $subtasks
        ]);
    }
    public function subtask_each(User $user , Cards $card , Subtasks $subtask)
    {
        // $subtasks = SubTasks::tree()->get()->toTree();
        return view('sub-task-each',
    [
        'user' => $user,
        'card' => $card,
        'sub_tasks' => $subtask
    ]);
    }
    public function status (User $user , Cards $card ,SubTasks $subtask)
    {
        if($subtask->parent_id != null)
        {
            $parent = SubTasks::find($subtask->parent_id);
            if($subtask->status == false )
            {
                $subtask->status = true;
                $parent->completion++;
                if($parent->completion == $parent->no_child)
                {
                    $parent->status = true;
                }
                else
                {
                    $parent->status = false;
                }
            }
            else
            {
                $subtask->status = false;
                $parent->completion--;
            }
            $flag = 0 ;
            $childs = 0 ;
            foreach($parent->children as $child)
            {
                $childs++;
                if($child->status == true)
                {
                    $flag++;
                }
            }
            if($flag != $childs ) $parent->status = false;
            $parent->save();
        }
        else 
        {
            if($subtask->status == false )
            {
                $subtask->status = true;
            }
            else
            {
                $subtask->status = false;
            }
        }

        $subtask->save();

        return redirect()->back();
        // route('subtaskeach',[$user->id,$card->id,$subtask->parent_id]);
    }
    public function delete(User $user , Cards $card,SubTasks $subtask)
    {
        if($subtask->parent_id != null)
        {
            $parent = SubTasks::find($subtask->parent_id);
            $parent->completion--;
            $parent->no_child--;
            $parent->save();
            $subtask->delete();
        }
        else 
        {
            $subtask->delete();
        }

        return redirect()->back();
        //route('subtaskeach',[$user->id,$card->id,$subtask->parent_id]);
    }
}
