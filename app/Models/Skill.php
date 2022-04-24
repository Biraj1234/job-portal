<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table = 'job_skills';
    protected $fillable = ['name', 'status', 'slug'];


    function jobSkill()
    {
        return $this->hasMany(JobJobSkill::class);
    }


    function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
