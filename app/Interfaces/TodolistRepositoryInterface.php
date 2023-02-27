<?php

namespace App\Interfaces;

interface TodolistRepositoryInterface 
{
    public function getAllTodo();
    public function getOwner();
    public function getTodoById($todoID);
    public function delete($todoID);
    public function createTodo(array $todoDetails);
    public function updateTodo($todoID, array $newDetails);
    public function getCompletedTodo();
}