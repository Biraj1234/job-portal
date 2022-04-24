<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable
{
    use HasFactory;


    protected $table = 'employers';

    protected $fillable = ["name", "email", "phone", "password", "logo", "description", "address"];


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
