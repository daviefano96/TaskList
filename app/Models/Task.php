<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ToDoList;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
       'to_do_list_id',
        'name',
        'status'
    ];

    public function todolist() {
        return $this->belongsTo(ToDoList::class);
    }
}
