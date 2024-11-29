<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    //protected $fillable = [];
    protected $guarded = [];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'education_skill');
    }
}
