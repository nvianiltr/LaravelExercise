<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
	public $timestamps = false; // disable timestamps because laravel created it automatically
    protected $table = "users"; // refers to table 'users' in the database
    protected $fillable = ['name', 'email', 'password']; //able to fill manually
    protected $guarded = []; // inverse of fillable

}
?>