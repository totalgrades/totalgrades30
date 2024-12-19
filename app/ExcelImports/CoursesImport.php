<?php

namespace App\ExcelImports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Course;
use App\Group;

class CoursesImport implements ToModel, WithHeadingRow
{
    public $term;

    public function __construct($term){
          $this->term = $term;
    }

    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {    
          return new Course([

          'course_code' => $row['course_code'],
          'name' => $row['course_name'],  
          'term_id' => $this->term,
          'group_id'=>Group::where('name', $row['group_name'])->first()->id,
          //'staffer_id' => Staffer::where('registration_code', $v['staffer_assigned_to'])->first()->id,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          ]);

    }
}