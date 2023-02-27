<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface 
{
    public function createTask(array $taskDetails) 
    {
        
        return Task::insert($taskDetails);
    }

    public function updateTask($taskId, array $newDetails){
        return Task::whereId($taskId)->update($newDetails);
    }

    public function unfinishTask($taskId) 
    {
        return Task::where('id',$taskId)->update(['status'=>'0']);
    }

    public function finishTask($taskId) 
    {
        return Task::where('id',$taskId)->update(['status'=>'1']);
    }

    public function delete($taskId){
        return Task::where('id',$taskId)->delete();
    }


}