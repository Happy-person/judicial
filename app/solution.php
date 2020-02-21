<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solution extends Model
{
    protected $fillable= ['case_type','case_description','solution','section','judge_name','court_name','judgement_date'];
    public $table= 'solutions';
}
