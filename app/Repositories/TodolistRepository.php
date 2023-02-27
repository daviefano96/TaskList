<?php

namespace App\Repositories;

use App\Interfaces\TodolistRepositoryInterface;
use App\Models\ToDoList;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class TodolistRepository implements TodolistRepositoryInterface 
{
    public function getAllTodo() 
    {
        return ToDoList::all(); 
    }

    public function getOwner() 
    {
        // return ToDoList::with('member')->where('user_id', auth()->user()->id)->get(); 
        return Member::join('to_do_lists', 'to_do_lists.id', '=' ,'members.to_do_list_id')
        ->where('members.user_id', auth()->user()->id)
        ->get();
    }

    public function getTodoById($todoID) 
    {
        return ToDoList::withCount('task')->where('id', $todoID)->first();
    }

    // public function deleteTodo($todoID) 
    // {
    //     ToDoList::destroy($todoID);
    // }

    public function createTodo(array $todoDetails) 
    {
        $todolist = ToDoList::create($todoDetails);
        return $todolist->member()->create($todoDetails);
    }

    public function updateTodo($todoID, array $newDetails) 
    {
        return ToDoList::whereId($todoID)->update($newDetails);
    }

    public function getCompletedTodo() 
    {
        return ToDoList::where('is_completed', true);
    }

    public function delete($todoID){
        return ToDoList::where('id',$todoID)->delete();
        // $todolist = ToDoList::where('id',$todoID)->delete();
        // return $todolist->task()->delete();
    }
}
