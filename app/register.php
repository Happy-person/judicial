<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    
    protected $fillable= ['user_id','age','gender','qualification','working_status','firm_name','experience','enrollment_no','photo','certificates'];
    protected $hidden=['password','remember_token'];
    public $table= 'lawyer_profile';
    

}
