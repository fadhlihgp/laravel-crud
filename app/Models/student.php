<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = ['nim', 'name', 'major'];
    protected $table = 'student';
    public $timestamps = false;
}
