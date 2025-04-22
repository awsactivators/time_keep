<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'project_id',
        'user_id',
        'date',
        'start_time',
        'end_time',
        'time_spent',
        'status',
        'notes',
        'link',
    ];
    

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function sessions()
    {
        return $this->hasMany(TaskSession::class);
    }

    
}
