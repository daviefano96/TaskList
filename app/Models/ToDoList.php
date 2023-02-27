<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;
use App\Models\Member;
use Illuminate\Database\Eloquent\SoftDeletes;


class ToDoList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'status',
        'deadline',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function task(){
        return $this->hasMany(Task::class);
    }

    public function member(){
        return $this->hasMany(Member::class);
    }
}
