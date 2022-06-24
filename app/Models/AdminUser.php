<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class AdminUser extends User
{
    use HasFactory;
    protected $guarded=[];


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }




}
