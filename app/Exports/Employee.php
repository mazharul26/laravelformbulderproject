<?php

namespace App\Exports;

use App\Models\EmployeeInfo;
use Maatwebsite\Excel\Concerns\FromCollection;

class Employee implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmployeeInfo::all();
    }
}
