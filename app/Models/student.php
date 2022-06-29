<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Authenticatable
{
    use HasFactory;


    protected $table = "students";
    protected $fillable = ['name','email','password','image'];

     public $timestamps = false;


}
