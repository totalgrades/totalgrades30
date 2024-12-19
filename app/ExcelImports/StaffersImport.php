<?php

namespace App\ExcelImports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Staffer;

class StaffersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Staffer|null
     */
    public function model(array $row)
    {    
      
          return new Staffer([

            'staffer_number' => $row['staffer_number'],
            'registration_code' => $row['registration_code'],
            'title' => $row['title'],
            'first_name'=>$row['first_name'],
            'last_name'=>$row['last_name'],
            'gender'=>$row['gender'],
            'employment_status'=>$row['employment_status'],
            'date_of_employment'=>$row['date_of_employment'],
            'nationality'=>$row['nationality'],
            'national_card_number'=>$row['national_card_number'],
            'passport_number'=>$row['passport_number'],
            'phone'=>$row['phone'],
            'state'=>$row['state'],
            'current_address'=>$row['current_address'],

          ]);

    }
}