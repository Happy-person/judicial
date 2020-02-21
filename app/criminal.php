<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class criminal extends Model
{
    protected $fillable= ['crimi_case_no','party_name','p_father_name','p_age','p_address','p_phone_no','opponent_name','o_father_name','o_age','o_address','o_phone_no','case_history','occurence_place','decision','o_previous_case_involved','o_previous_case','lawyer_req','FIR_copy','evidence'];
    public $table= 'criminal_cases';
}
