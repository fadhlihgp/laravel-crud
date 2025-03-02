<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['username', 'password', 'fullName'];
    protected $table = 'account';
    public $timestamps = false;
}
