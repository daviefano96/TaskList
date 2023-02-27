<?php

namespace App\Interfaces;

interface TaskRepositoryInterface 
{
    public function createTask(array $taskDetails);
    public function updateTask($taskId, array $newDetails);
    public function finishTask($taskId);
    public function unfinishTask($taskId);
    public function delete($taskId);
}