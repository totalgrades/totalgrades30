<?php

namespace App\ExcelImports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Student;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Student|null
     */
      public function model(array $row)
      {   
      
            return new Student([

                  'student_number' => $row['student_number'],
                  'registration_code' => $row['registration_code'], 
                  'first_name'=>$row['first_name'],
                  'last_name'=>$row['last_name'],
                  'gender'=>$row['gender'],
                  'dob'=>$row['dob'],
                  'date_enrolled'=>date('Y-m-d H:i:s'),
                  'date_graduated'=>$row['date_graduated'],
                  'date_unenrolled'=>$row['date_unenrolled'],
                  'nationality'=>$row['nationality'],
                  'national_card_number'=>$row['national_card_number'],
                  'passport_number'=>$row['passport_number'],
                  'phone'=>$row['phone'],
                  'email'=>$row['email'],
                  'state'=>$row['state'],
                  'current_address'=>$row['current_address'],
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),

            ]);

    }
}