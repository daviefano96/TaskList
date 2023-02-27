<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use App\Http\Requests\TaskRequest;

class TodolistController extends Controller
{

    protected $Todolist;

    public function __construct(TodolistService $Todolist)
    {
        $this->Todolist = $Todolist;
    }

    public function viewdashboard(){
        $todolists = $this->Todolist->listOwner();
 
         return view('dashboard')->with('tasks', $todolists);
     }   


    public function viewtasklist(){
       $todolists = $this->Todolist->listOwner();

        return view('tasklist')->with('tasks', $todolists);
    }   

    public function taskview($todolist_id){
        $tasks = $this->Todolist->taskview($todolist_id);

        return view('taskview')->with('task', $tasks);
    }

    public function createtask(TaskRequest $request){
        $this->Todolist->createtask($request->validated());

        return back()->with('success', 'Task succesfully added');
    }

    public function deleteTask($taskId){
        // echo "it is here";die;
        $this->Todolist->delete($taskId);
        return back()->with('success', 'Deleted Task');

    }


}   
