<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    use HasFactory;

    protected $fillable =[
        'employee_name',
        'employee_email',
        'employee_mobile_no',

    ];
    public function education()
    {
    	return $this->hasMany(EducationalQualification::class,'employee_id','id')->select('id','educational_qualification','employee_id');
    }
}
