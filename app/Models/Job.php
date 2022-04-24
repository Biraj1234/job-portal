<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $fillable = ["title", "description", "employer_id", "status", "views", "number_of_applicants", "deadline", "job_type_id", "job_level_id", "category_id", "no_of_vaccancy", "requirements", "benifits", "location_id"];


    function jobType()
    {
        return $this->belongsTo(Type::class, 'job_type_id');
    }

    function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }
    function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    function level()
    {
        return $this->belongsTo(JobLevel::class, 'job_level_id');
    }
    function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }


    function seekers()
    {
        return $this->belongsToMany(JobSeeker::class, 'job_jobseeker',  'jobseeker_id', 'job_id');
    }

    function jobSeeker()
    {
        return $this->hasMany(JobJobseeker::class);
    }


    function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_job_skill', 'job_id', 'job_skill_id');
    }

    function jobSkill()
    {
        return $this->hasMany(JobJobSkill::class);
    }
}
