<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class JobSeeker extends Authenticatable
{
    use HasFactory;


    protected $table = 'jobseekers';

    protected $fillable = ["name", "username", "password", "phone", "email", "dob", "profile_picture", "bio", "profile_visit", "cv_downloads", "category_id"];


    function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_jobseeker',  'jobseeker_id', 'job_id');
    }

    function education()
    {
        return $this->hasMany(Education::class);
    }

    function skills()
    {
        return $this->belongsToMany(Skill::class, 'jobseeker_skill', 'jobseeker_id', 'job_skill_id');
    }
    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
