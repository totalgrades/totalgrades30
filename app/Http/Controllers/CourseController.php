<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School_year;
use App\Event;
use App\Term;
use Carbon\Carbon;
use App\Course;
use Auth;
use Image;
use App\Student;
use App\Grade;
use App\Group;
use App\Charts\StudentAverage;
use App\Charts\ClassStats;
use App\Charts\TotalScore;
use \Crypt;
use App\StudentRegistration;
use DB;
use App\GradeActivity;



class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index(School_year $schoolyear)
    {
         //get current school year
        $current_school_year = School_year::where([['start_date', '<=', Carbon::today()], ['show_until', '>=', Carbon::today()]])->first();

        //Start of School statistics
        //school max, min, total, count, school average
        $school_grades= DB::table('grades')
            ->join('grade_activities', 'grade_activities.id', '=', 'grades.grade_activity_id')
            ->where('grade_activities.school_year_id', $current_school_year->id)
            ->groupBy('course_id')->groupBy('student_id')->get(['student_id', 'school_year_id', 'course_id', DB::raw('SUM(activity_grade) as total')]);
        
        $school_max_school_year = $school_grades->max('total');
        $school_min_school_year = $school_grades->min('total');
        $school_total_school_year = $school_grades->sum('total');
        $school_count_school_year = $school_grades->count('total');
        $school_avg_school_year = $school_grades->avg('total');

        // $chart_student_average = Charts::create('bar', 'highcharts')
        //         ->title(" $current_school_year->school_year School Wide Statistics")
        //         ->elementLabel('Grade(%)')
        //         ->labels(['School Minimum', 'School Maximum', 'School Average'])
        //         ->values([ $school_min_school_year, $school_max_school_year, $school_avg_school_year])
        //         ->dimensions(0,230);  

        $chart_student_average = new StudentAverage;
        $chart_student_average->labels(['School Minimum', 'School Maximum', 'School Average']);
        $chart_student_average->dataset("Grade(%)", 'bar', 
                    [$school_min_school_year, $school_max_school_year, $school_avg_school_year])
                    ->options([
                        'fill' => 'true',
                        'borderColor' => [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(54, 162, 235)'],
                        'backgroundColor' =>[
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)','rgba(54, 162, 235, 0.2)']
                        ]);
    
        return view('currentcourses', compact( 'current_school_year', 'schoolyear', 'chart_student_average'));
    }

  

    
    public function showCourse(School_year $schoolyear, Term $term, $course)
    {

        $course = Course::find(Crypt::decrypt($course));

        //get all grade activities for this course
        $grade_activities_course = GradeActivity::where('course_id', $course->id)->get();

        $student = Student::where('registration_code', '=', Auth::user()->registration_code)->first();

        $class_members = @StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', $term->id)->where('group_id', '=', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id)->get();

             
        $positions= DB::table('grades')
            ->join('grade_activities', 'grade_activities.id', '=', 'grades.grade_activity_id')
            ->where('grade_activities.school_year_id', $schoolyear->id)
            ->where('grade_activities.term_id', $term->id)
            ->where('grade_activities.course_id', $course->id)
            ->where('grade_activities.group_id', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id )
            ->groupBy('course_id')->groupBy('student_id')->get(['student_id', 'school_year_id', 'group_id','term_id', 'course_id', DB::raw('SUM(activity_grade) as total')])->sortByDesc('total')->pluck('student_id')->toArray();

        // Total Grades for all the students in the class for this course
        $class_grades= DB::table('grades')
            ->join('grade_activities', 'grade_activities.id', '=', 'grades.grade_activity_id')
            ->where('grade_activities.school_year_id', $schoolyear->id)
            ->where('grade_activities.term_id', $term->id)
            ->where('grade_activities.course_id', $course->id)
            ->where('grade_activities.group_id', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id )
            ->groupBy('course_id')->groupBy('student_id')->get(['student_id', 'school_year_id', 'group_id','term_id', 'course_id', DB::raw('SUM(activity_grade) as total')]);
                       
        $class_highest = $class_grades->max('total');
        $class_lowest = $class_grades->min('total');
        $class_average = $class_grades->avg('total');

        //Student grades for this course
        $student_grades_course= DB::table('grades')
            ->join('grade_activities', 'grade_activities.id', '=', 'grades.grade_activity_id')
            ->where('grades.student_id', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)
            ->where('grade_activities.school_year_id', $schoolyear->id)
            ->where('grade_activities.term_id', $term->id)
            ->where('grade_activities.course_id', $course->id)
            ->where('grade_activities.group_id', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id )
            ->orderBy('grade_activity_category_id')->get();
        

        $grade= DB::table('grades')
            ->join('grade_activities', 'grade_activities.id', '=', 'grades.grade_activity_id')
            ->where('grades.student_id', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)
            ->where('grade_activities.school_year_id', $schoolyear->id)
            ->where('grade_activities.term_id', $term->id)
            ->where('grade_activities.course_id', $course->id)
            ->where('grade_activities.group_id', StudentRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('student_id', '=', Student::where('registration_code', '=', Auth::user()->registration_code)->first()->id)->first()->group_id )
            ->first(['student_id', 'school_year_id', 'group_id','term_id', 'course_id', DB::raw('SUM(activity_grade) as total')]);

       $student_course_grade = $student_grades_course->sum('activity_grade');
      //dd($student_grades_course->sum('activity_grade'));

       /* $chart_ca = Charts::create('pie', 'highcharts')
                ->title('Course Statistics _ % of total Score')
                ->labels(['1st CA', '2nd CA', '3rd CA', '4th CA', 'Final Exam'])
                ->values([ 
                    foreach ($student_grades_course as $key => $grade) {

                       echo $grade->activity_grade;
                    }
                    
                ])
                ->dimensions(0,260);*/

        // $chart_class_stats = Charts::create('bar', 'highcharts')
        //         ->title('Class Statistics')
        //         ->labels(['Class Minimum', 'Your Grade', 'Class Maximum', 'Class Average'])
        //         ->values([ $class_lowest, $student_course_grade, $class_highest, $class_average])
        //         ->dimensions(0,230);
        

        // $chart_total_score = Charts::create('percentage', 'justgage')
        //         ->title('Your total Score')
        //         ->elementLabel('%')
        //         ->values([@$grade->total,0,100])
        //         ->responsive(false)
        //         ->height(260)
        //         ->width(0);

    
        $chart_total_score = new TotalScore;
        $chart_total_score->title('Your total Score');
        $chart_total_score->labels(['Your Grade', 'Class Maximum', 'Class Average']);
        $chart_total_score->dataset('','doughnut', [@$grade->total,0,100])
                    ->options([
                        'fill' => 'true',
                        'backgroundColor' =>[
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)']
                        ]);  

        $chart_class_stats = new ClassStats;
        $chart_class_stats->title('Class Statistics');
        $chart_class_stats->labels(['Class Minimum', 'Your Grade', 'Class Maximum', 'Class Average']);
        $chart_class_stats->dataset('','bar', 
                    [ $class_lowest, $student_course_grade, $class_highest, $class_average])
                    ->options([
                        'fill' => 'true',
                        'borderColor' => [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(54, 162, 235)','rgb(255, 159, 64)'],
                        'backgroundColor' =>[
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 159, 64, 0.2)']
                        ]); 
        return view('showcourse', compact( 'schoolyear', 'term', 'grade', 'course', 'grade_activities_course', 'positions','class_highest',
            'class_lowest', 'class_average', 'chart_class_stats',  'class_members', 'student_grades_course', 'student_course_grade','chart_total_score'));

    }

    
}
