<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserData; 

class UserData extends Model
{
    use HasFactory;
    protected $table = "user_data";
    protected $fillable = [
        'name',
        'email',
        'gender',
        'dob',
    ];
}
