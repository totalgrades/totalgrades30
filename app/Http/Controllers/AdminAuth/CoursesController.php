<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\School_year;
use App\Event;
use App\Term;
use Carbon\Carbon;

use App\Http\Requests;
use Auth;
use Image;
use App\Student;
use App\Group;
use App\Staffer;
use App\Course;

use App\Admin;
use \Crypt;
use App\GradeActivity;

class CoursesController extends Controller
{

	
    public function show(School_year $schoolyear, Term $term)
    {

        
        $term_courses = Course::where('term_id', '=', $term->id)->get();

        $grade_activities = GradeActivity::where('School_year_id', $schoolyear->id)->where('term_id', $term->id)->get();


       return view('admin.showadmincourses', compact('schoolyear', 'term','term_courses', 'grade_activities'));
    }


    public function students()
    {

        //get current date
        $today = Carbon::today();

        //get teacher's section and group
        $teacher = Auth::guard('web_admin')->user();

        $reg_code = $teacher->registration_code;

        $teacher = Staffer::where('registration_code', '=', $reg_code)->first();

        

        //get students in group_section
        $students_in_group = Student::where('group_id', '=', $teacher->group_id)
        ->get();

        


        $count = 0;
        foreach ($students_in_group as $students) {
            $count = $count+1;
        }

        $group_teacher = Group::where('id', '=', $teacher->group_id)->first();
        

        //get terms
        $terms = Term::get();

        foreach ($terms as $t){
            if ($today->between($t->start_date, $t->show_until )){
                $current_term =  $t->term;

            }
                                                         
        }

        //get school school
        $schoolyear = School_year::first();



               
        

        return view('admin.studentsterm', compact('students_in_group', 'today', 'teacher', 'count', 'group_teacher', 'terms', 'current_term', 'schoolyear', 't'));
    }
}
    

