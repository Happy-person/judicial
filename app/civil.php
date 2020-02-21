<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class civil extends Model
{
    protected $fillable= ['civil_case_no','party_name','p_father_name','p_age','p_address','p_phone_no','opponent_name','o_father_name','o_age','o_address','o_phone_no','case_history','decision','documents','lawyer_req'];
    public $table= 'civil_cases';
}
