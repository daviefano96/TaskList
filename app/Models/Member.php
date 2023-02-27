<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'to_do_list_id',
        'status',
     ];
 
     public function todolist() {
         return $this->belongsTo(ToDoList::class);
     }
}
