<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'permissions';
    protected $fillable = ['title', 'module_id', 'status'];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
