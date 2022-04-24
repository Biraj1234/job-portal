<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerSkill extends Model
{
    use HasFactory;
    protected $table = 'jobseeker_skill';
    protected $fillable = ['jobseeker_id', 'job_skill_id'];

    function jobs()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    function jobseekers()
    {
        return $this->belongsTo(JobSeeker::class, 'jobseeker_id');
    }
}
