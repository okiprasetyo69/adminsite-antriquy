<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SysMobileUser extends Model
{
    protected $table = "sys_mobile_users";
    protected $fillable = [
        'id',
        'username',
        'name',
        'email',
        'pwd',
        'salt',
        'deleted',
        'created_at',
        'updated_at',
        'firebase_token'
    ];

    protected $hidden = array('pwd','salt');

    public $incrementing = false;
    protected $keyType = 'string';
}
