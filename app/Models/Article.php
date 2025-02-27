<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'article_skill');
    }
}
