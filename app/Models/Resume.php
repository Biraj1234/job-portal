<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';
    protected $fillable = ['jobseeker_id', 'resume'];

    function jobseeker()
    {
        return $this->belongsTo(JobSeeker::class, 'jobseeker_id');
    }
}
