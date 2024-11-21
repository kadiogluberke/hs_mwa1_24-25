<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [];


    public function skills()
    {
        return $this->belongsToMany(Skill::class, "skill_task");
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
