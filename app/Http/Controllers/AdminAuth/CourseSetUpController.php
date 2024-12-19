<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\School_year;
use Carbon\Carbon;
use App\Student;
use App\Staffer;
use App\Course;
use App\Group;
use App\Event;
use App\Term;
use App\User;
use Excel;
use Image;
use Auth;
use DB;
use App\ExcelImports\CoursesImport;
use App\ExcelImports\GroupCoursesImport;



class CourseSetUpController extends Controller
{
    public function schoolyears()
    {
            
        return view('admin.superadmin.schoolsetup.courses.schoolyears');
    }


    public function showCoursesGroups($schoolyear_id, $term_id)
    {

       	$term = Term::find($term_id);

        $schoolyear = School_year::find($schoolyear_id);

        return view('admin.superadmin.schoolsetup.showcoursesgroups', compact('schoolyear', 'term'));
    }

    public function bulkUploadCourses(Request $request, $schoolyear, $term)
    {
        try {

            Excel::import(new CoursesImport($term), request()->file('import_file'));
            flash('Courses uploaded Successfully!!')->success();

        } catch (\Throwable $th) {

            flash($th->getMessage())->error();
        }
    
        return back();
    }
    

    public function showCourses($schoolyear_id, $term_id, $group_id)
    {

        $schoolyear = School_year::find($schoolyear_id);

        $term = Term::find($term_id);

        $group = Group::find($group_id);
        
        $courses = Course::where('group_id', '=', $group->id)->where('term_id', '=', $term->id)->get();
    
        return view('admin.superadmin.schoolsetup.showcourses', compact('schoolyear', 'term', 'group',  'courses'));
    }


    public function postCourse(Request $r, $schoolyear_id, $term_id, $group_id) 
    {
        
        $schoolyear = School_year::find($schoolyear_id);
        $term = Term::find($term_id);
        $group = Group::find($group_id);
        
        $this->validate(request(), [

            'term_id' => 'required',
            'group_id' => 'required',
            'course_code' => 'required|unique:courses',
            'name' => 'required',
       
            ]);

        Course::insert([

            'term_id'=>$r->term_id,
    		'group_id'=>$r->group_id,
            'course_code'=>$r->course_code,
            'name'=>$r->name,
            'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
       
        ]);

               
        flash('Course Added Successfully')->success();

        
        return redirect()->route('showcourses', [ 'school_year_id' => $schoolyear->id, 'term_id' => $term->id, 'group_id' => $group->id]);
    }

    public function postCourseUpdate(Request $r, $id, $group_id, $term_id)
    {
        $this->validate(request(), [

            'term_id' => 'required',
            'group_id' => 'required',
            'course_code' => 'required',
            'name' => 'required',
                
            ]);

        $course = Course::find($id);
        $group = Group::find($group_id);
        $term = Term::find($term_id);
        
                
        $course_edit = Course::where('id', '=', $course->id)->first();
        
        $course_edit->course_code= $r->course_code;

        $course_edit->name= $r->name;
        
          
        $course_edit->save();

        flash('Course Updated Successfully')->success();

        return redirect()->route('showcourses', ['group_id' => $group->id, 'term_id' => $term->id ]);


    }

    public function deleteCourse($id)
    {
        Course::destroy($id);

        flash('Course has been deleted')->error();

        return back();
    }


    public function importCourses(Request $request, $group_id, $term_id)
    {
        try {

            Excel::import(new GroupCoursesImport($term_id,$group_id), request()->file('import_file'));
            flash('Courses uploaded Successfully!!')->success();

        } catch (\Throwable $th) {

            flash($th->getMessage())->error();
        }
    
        return back();
    }



    
}
