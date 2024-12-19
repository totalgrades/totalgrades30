<?php

namespace App\ExcelImports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Course;
use App\Group;

class GroupCoursesImport implements ToModel, WithHeadingRow
{
    public $term;
    public $group;


    public function __construct($term, $group){
          $this->term = $term;
          $this->group = $group;
    }

    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {    
          return new Course([
            'term_id' => $this->term,
            'group_id' => $this->group,
            'course_code' => $row['course_code'], 
            'name' => $row['name'],
            'staffer_id' => $row['staffer_id'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ]);

    }
}