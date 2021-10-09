<?php

  namespace App\Imports;

  use App\Models\EmployeeInfo;
  use Maatwebsite\Excel\Concerns\ToModel;
  use Maatwebsite\Excel\Concerns\WithHeadingRow;

  class UsersImport implements ToModel, WithHeadingRow
  {
      /**
      * @param array $row
      *
      * @return \Illuminate\Database\Eloquent\Model|null
      */
      public function model(array $row)
      {
          return new EmployeeInfo([
              'employee_name'     => $row['name'],
              'employee_email'    => $row['email'],
          ]);
      }
  }
