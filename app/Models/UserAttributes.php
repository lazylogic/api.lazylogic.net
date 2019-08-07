<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

trait UserAttributes
{
    /**
     * role_type
     */
    public function getRoleTypeAttribute()
    {
        return @ROLL_TYPE[@$this->attributes['role']] ?: TYPE_MEMBER;
    }

    /**
     * full_name
     */
    public function getFullnameAttribute()
    {
        return "{$this->attributes['first_name']} {$this->attributes['last_name']}";
    }

    /**
     * is_loggedin
     */
    public function getIsLoggedInAttribute()
    {
        return Auth::check();
    }
}