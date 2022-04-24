<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobJobSkill extends Model
{

    use HasFactory;
    public $timestamps = false;

    protected $table = 'job_job_skill';
    protected $fillable = ['job_id', 'job_skill_id'];

    function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    function skil()
    {
        return $this->belongsTo(Skill::class, 'job_skill_id');
    }
}
