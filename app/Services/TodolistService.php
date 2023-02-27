<?php 

namespace App\Services;
use App\Interfaces\TodolistRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class TodolistService{

    private TodolistRepositoryInterface $todolistRepository;
    private UserRepositoryInterface $UserRepository;

    public function __construct(TodolistRepositoryInterface $todolistRepository, UserRepositoryInterface $UserRepository) 
    {
        $this->todolistRepository = $todolistRepository;
        $this->UserRepository = $UserRepository;
    }
    
    public function listOwner()
    {
        $todolist = $this->todolistRepository->getOwner();
       

        $ongoing = 0;
        $complete = 0;
        $noprogress = 0;

        foreach($todolist as $todo){
            if($todo->status==0){
                $complete = $complete + 1;
            }
            else if($todo->status==1)
            {
                $noprogress = $noprogress + 1;
            }
            else{
                $ongoing = $ongoing + 1;
            }
        }
        $todolist->ongoing = $ongoing;
        $todolist->complete = $complete;
        $todolist->noprogress = $noprogress;

        return $todolist;
    }

    public function viewlist()
    {
        $todolist = $this->todolistRepository->getAllTodo();

        return $todolist;
    }

    public function taskview($todolist_id){
        $todolist = $this->todolistRepository->getTodoById($todolist_id);
        $todolist->users = $this->UserRepository->getAllUser();
        
        $finished = 0;
        $unfinished = 0;
        foreach($todolist->task as $subtask){
            if($subtask->status == 0){
                $finished = $finished + 1;
            }   
            else{
                $unfinished = $unfinished + 1;
            }
        }
        if($todolist->task_count!=0){
            $percent = number_format(($finished / $todolist->task_count) * 100, 0);
            
            $todolist->percent = $percent;

            if($percent==100)
            {
                $this->todolistRepository->updateTodo($todolist_id, $data =[
                    'status' => 0,
                ]);
            }
            else if($percent==0){
                $this->todolistRepository->updateTodo($todolist_id, $data =[
                    'status' => 1,
                ]);
            }
            else{
                $this->todolistRepository->updateTodo($todolist_id, $data =[
                    'status' => 2,
                ]);
            } 
        }


        $todolist->finished = $finished;
        $todolist->unfinished = $unfinished;

        return $todolist;
    }

    public function createtask(array $request){
        // dd($request);
       $this->todolistRepository->createTodo($request);
    }

    public function delete($taskId){
        $this->todolistRepository->delete($taskId);
    }
    
 
}
