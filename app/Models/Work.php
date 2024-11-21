<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [];


    public function skills()
    {
        return $this->belongsToMany(Skill::class, "skill_work");
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


}
