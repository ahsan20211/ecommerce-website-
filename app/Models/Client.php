<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Authenticatable
{
    protected $table = 'client_user';
    protected $fillable = ['name', 'email' , 'google_id'];
    use HasFactory;
}
