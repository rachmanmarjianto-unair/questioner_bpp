<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $primaryKey = 'idusers'; // ganti sesuai kolommu
    public $incrementing = false;       // jika bukan auto increment
    protected $keyType = 'int';          // atau 'string'
}

