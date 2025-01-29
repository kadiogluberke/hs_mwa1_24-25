<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function educations()
    {
        return $this->belongsToMany(Education::class, 'education_skill');
    }

    public function works()
    {
        return $this->belongsToMany(Work::class, 'skill_work');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'skill_task');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_skill');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skill');
    }
}
