<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobJobseeker extends Model
{
    use HasFactory;
    protected $table = 'job_jobseeker';
    protected $fillable = ['job_id', 'jobseeker_id'];

    function jobs()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    function jobseekers()
    {
        return $this->belongsTo(JobSeeker::class, 'jobseeker_id');
    }
}
