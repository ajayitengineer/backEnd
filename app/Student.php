<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected  $table = 'students';
    protected $fillable = ['first_name','last_name','email','password','age','city','country','state','zip_code','pocket_money'];

}
    	