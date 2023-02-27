<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\SubtaskController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('home');
})->middleware('guest')->name('/');

Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/signup', [UserController::class, 'signup'])->name('user.signup');


Route::group(['middleware' => 'auth'], function () {
    // Route::get('/dashboard', function () { return view('dashboard'); })->name('/dashboard');

    
    Route::get('/dashboard', [TodolistController::class, 'viewdashboard'])->name('/dashboard');
    Route::get('/viewtasklist', [TodolistController::class, 'viewtasklist'])->name('viewtasklist');
    Route::post('/viewtask/add', [TodolistController::class, 'createtask'])->name('viewtask.add');

    // Route::group(['middleware' => 'isOwner'], function () {
        Route::get('/taskview/{task_id}', [TodolistController::class, 'taskview'])->name('taskview');
        Route::get('deletetask/{task_id}', [TodolistController::class, 'deleteTask'])->name('deletetask');
    // });

    Route::post('/taskview/add', [SubtaskController::class, 'addsubtask'])->name('taskview.add');
    Route::post('/taskview/edit', [SubtaskController::class, 'editsubtask'])->name('taskview.edit');
    Route::post('taskview/unfinish', [SubtaskController::class, 'unfinish'])->name('unfinish');
    Route::post('taskview/finish', [SubtaskController::class, 'finish'])->name('finish');
    Route::get('delete/{task_id}', [SubtaskController::class, 'delete'])->name('delete');
    Route::post('addmember', [MemberController::class, 'createMember'])->name('addmember');
    Route::post('leave', [MemberController::class, 'leaveTask'])->name('leave');

});

Route::post('logout', [UserController::class, 'logout'])->name('logout');