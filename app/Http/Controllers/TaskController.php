<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskModel ;


class TaskController extends Controller
{

    public function index(){
        $tasks = TaskModel::latest()->get();
        return view('home',compact('tasks'));
    }

    public function addTask(Request $req){

        $req->validate([
            'title' => "required|string|max:255|min:3"
        ]);

        TaskModel::create([
            "title" => $req->title ,
            "completed" => false ,
        ]);
        
        return redirect()->back() ;
    }
}
