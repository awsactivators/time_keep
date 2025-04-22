<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskSession extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'task_id',
        'date',
        'start_time',
        'end_time',
        'time_spent',
        'notes',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
