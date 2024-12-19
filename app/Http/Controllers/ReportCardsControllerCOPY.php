<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

use App\Http\Requests;
use App\School_year;
use App\Term;
use Carbon\Carbon;
use App\Course;
use Auth;
use Image;
use App\Student;
use App\Grade;
use App\Group;
use App\Comment;
use App\Staffer;
use App\HealthRecord;
use App\Attendance;
use DB;
use PDF;
use \Crypt;
use App\StudentRegistration;
use App\StafferRegistration;


class ReportCardsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($schoolyear_id)
    {
        $schoolyear = School_year::find(Crypt::decrypt($schoolyear_id));

        $student_registered_groups = StudentRegistration::with('group')->where('school_year_id', '=', $schoolyear->id)
                ->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)
                ->first()->id)->get();

        //dd($student_registered_groups);

        //$student_group = Group::where('id','=', where('group_id', $group->id)->first();

        return view('reportcards', compact('schoolyear', 'student_registered_groups'));
    }

    public function showReportCardTerms(School_year $schoolyear, $term)
    {
        //get current date
        $today = Carbon::today();

        $term = Term::find(Crypt::decrypt($term));

        $term_id = $term->id;

        $next_term_id = $term_id +1;

        $next_term = Term::find( $next_term_id);

    
        $student = Student::where('registration_code', '=', Auth::user()->registration_code)->first();


        $student_group = StudentRegistration::with('group')->where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first();

        //please change 2 to a ny number that matches your school group pattern
        //$next_group = Group::where('id','=', $student->group_id+2)->first();

        
        $student_teacher = StafferRegistration::with('staffer')->where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('group_id', '=', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id )->first();

        $students_all = StudentRegistration::where('group_id', '=', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id)->get();

                              
        //get term
        $terms = Term::get();

        $courses = Course::where('term_id', $term->id)
                    ->where('group_id', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id )->get();

        // student's grades for all the courses in this term
        $course_grades = DB::table('grades')
            ->join('grade_activities', 'grade_activities.id', '=', 'grades.grade_activity_id')
            ->where('grades.student_id', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)
            ->where('grade_activities.school_year_id', $schoolyear->id)
            ->where('grade_activities.term_id', $term->id)
            ->where('grade_activities.group_id', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id )
            ->groupBy('course_id')->groupBy('student_id')->get(['student_id', 'school_year_id', 'group_id','term_id','course_id', DB::raw('SUM(activity_grade) as total')]);

        
        $course_grade_all = DB::table('grades')
            ->join('grade_activities', 'grade_activities.id', '=', 'grades.grade_activity_id')
            ->where('grades.student_id', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)
            ->where('grade_activities.school_year_id', $schoolyear->id)
            ->where('grade_activities.term_id', $term->id)
            ->where('grade_activities.group_id', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id )
            ->groupBy('course_id')->get(['student_id', 'school_year_id', 'group_id','term_id','course_id', DB::raw('SUM(activity_grade) as total')]);


        $course_grade_all_students = DB::table('grades')
            ->join('grade_activities', 'grade_activities.id', '=', 'grades.grade_activity_id')
            ->where('grade_activities.school_year_id', $schoolyear->id)
            ->where('grade_activities.term_id', $term->id)
            ->where('grade_activities.group_id', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id )
            ->groupBy('course_id')->groupBy('student_id')->get(['student_id', 'school_year_id', 'group_id','term_id','course_id', DB::raw('SUM(activity_grade) as total')]);

        $grade_grade_activities_ranking = DB::table('grades')
                    ->join('grade_activities', 'grade_activities.id', '=', 'grades.grade_activity_id')
                    //->where('grades.student_id', $student->id)
                    ->where('grade_activities.school_year_id', $schoolyear->id)
                    ->where('grade_activities.term_id', $term->id)
                    ->where('grade_activities.group_id', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id )
                    ->groupBy('course_id')->groupBy('student_id')->get(['student_id', 'course_id', DB::raw('SUM(activity_grade) as sum')])->sortByDesc('sum')->groupBy('course_id');
               
        //dd($course_grades);

        $sorted = $course_grade_all_students->sortByDesc('total');


        $sorted_grouped = $course_grade_all_students->sortByDesc('total')->groupBy('course_id');
        

        //addd comments
        $comment_all = Comment::where('student_id', '=', $student->id)
                                    ->where('term_id', '=', $term_id)
                                    ->first();

       //get health records
        
        $health_record = HealthRecord::where('student_id', '=', $student->id)
                        ->where('term_id', '=', $term->id)
                        ->first();
       
        $attendance = Attendance::where('student_id', '=', $student->id)
                                    ->where('term_id', '=', $term->id)
                                    ->count();

        $attendance_code = Attendance::join('attendance_codes', 'attendances.attendance_code_id', '=', 'attendance_codes.id')
                                    ->where('student_id', '=', $student->id)
                                    ->where('term_id', '=', $term->id)
                                    ->get();


        $attendance_present = $attendance_code->where('code_name', '=', 'Present')->count();
        $attendance_absent = $attendance_code->where('code_name', '=', 'Absent')->count();
        $attendance_late = $attendance_code->where('code_name', '=', 'Late')->count();

        
        // dd($courses);         
        
        return view('showtermreportcard', 
        	compact( 'schoolyear', 'today', 'term','terms','term_id', 'student_group',
        			'student', 'course', 'course_grades', 'courses',
                    'course_grade_all_students', 'comment_all', 'student_teacher', 'students_all', 'next_group',
                    'sorted_grouped', 'next_term', 'health_record', 'attendance_present',
                    'attendance_absent', 'attendance_late', 'attendance', 'grade_grade_activities_ranking','today'
                    ));

    }

    public function pdfshow($id)
    {
        //get current date
        $today = Carbon::today();

        $term = Term::find(Crypt::decrypt($id));

        $term_id = $term->id;

                
        $user = Auth::user();

        $reg_code = $user->registration_code;

        $student = Student::where('registration_code', '=', $reg_code)->first();



        $student_group = Group::where('id','=', $student->group_id)->first();


        $next_group = Group::where('id','=', $student->group_id+2)->first();

        
        $student_teacher = Staffer::where('group_id', '=', $student_group->id )->first();

        $students_all = Student::where('group_id', '=', $student_group->id)->get();

                                
        //get term

        $terms = Term::get();

        //dd($student_group);


        
        $course_grade = Course::join('grades', 'courses.id', '=', 'grades.course_id')
        ->where('student_id', '=', $student->id)
        ->where('courses.term_id', '=', $term->id)
        ->get();

        //dd($course_grade->sum('total')/$course_grade->count());

        
        $mgb = DB::table('grades')->groupBy('course_id')->get(['course_id', DB::raw('MAX(total) as max')]);



        $mgb_lowest = DB::table('grades')->groupBy('course_id')->get(['course_id', DB::raw('min(total) as min')]);

    
        $mgb_avg = DB::table('grades')->groupBy('course_id')->get(['course_id', DB::raw('avg(total) as avg')]);
        
        

        $pluck_course_id = $mgb->pluck('course_id')->toArray(); 

        $pluck_course_id_min = $mgb_lowest->pluck('course_id')->toArray();
        
        $pluck_course_id_avg = $mgb_avg->pluck('course_id')->toArray(); 


        $course_grade_all_students = Course::join('grades', 'courses.id', '=', 'grades.course_id')
        ->where('courses.group_id', '=', $student->group_id)
        ->where('courses.term_id', '=', $term->id)
        ->get();

        
    
        $sorted = $course_grade_all_students->sortByDesc('total');

        $sorted_grouped = $course_grade_all_students->sortByDesc('total')->groupBy('course_id');

        


        //addd comments
        $comment_all = Comment::where('student_id', '=', $student->id)
                                    ->where('term_id', '=', $term_id)
                                    ->first();

        //get health records
        $health_record = HealthRecord::where('student_id', '=', $student->id)
                ->where('term_id', '=', $term->id)
                ->first();

        
        $attendance = Attendance::where('student_id', '=', $student->id)
                                    ->where('term_id', '=', $term->id)
                                    ->count();

        $attendance_code = Attendance::join('attendance_codes', 'attendances.attendance_code_id', '=', 'attendance_codes.id')
                                    ->where('student_id', '=', $student->id)
                                    ->where('term_id', '=', $term->id)
                                    ->get();


        $attendance_present = $attendance_code->where('code_name', '=', 'Present')->count();
        $attendance_absent = $attendance_code->where('code_name', '=', 'Absent')->count();
        $attendance_late = $attendance_code->where('code_name', '=', 'Late')->count();
        


        $pdf = PDF::loadView('pdfshowtermreportcard', 
            compact('today', 'term','terms','term_id', 'student_group',
                    'student', 'grade', 'course', 'course_grade',
                    'mgb', 'mgb_lowest', 'mgb_avg', 
                    'pluck_course_id', 'pluck_course_id_min', 'pluck_course_id_avg',
                    'comment_all', 'student_teacher', 'students_all', 'next_group', 'sorted_grouped'          
                    ))->setPaper('a0')->setOrientation('landscape');

        return $pdf->download('reportcard.pdf');



    }
}
