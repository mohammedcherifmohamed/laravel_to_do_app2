<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskModel ;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{

    public function index(){
      $tasks = TaskModel::where('user_id', Auth::id())
                      ->latest()
                      ->get();
        $user = Auth::user() ;
        return view('home',compact('tasks','user'));
    }

    public function addTask(Request $req){

        $req->validate([
            'title' => "required|string|max:255|min:3"
        ]);

        TaskModel::create([
            "title" => $req->title ,
            "completed" => false ,
            "user_id" => Auth::id() ,
        ]);
        
        return redirect()->back() ;
    }

    public function deleteTask($id){

        $task = TaskModel::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success',"task Deleted") ;
    }

    public function toggleCompete($id){

        $task = TaskModel::findOrFail($id);
        $task->completed = !$task->completed ;
        $task->save();
        return redirect()->back()->with('success',"Task Updated") ;


    }

}
