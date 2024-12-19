@extends('admin.superadmin.dashboard')

@section('content')

<div class="page-header">
    <div class="alert alert-block alert-success">
      <strong class="green">
          <h1>Bulk upload {{$schoolyear->school_year}} {{$term->term}} courses for {{$group->name}}</h1>
      </strong>
      <span style="color: black">
          <i class="ace-icon fa fa-info-circle blue"></i> You can also add courses individually<br>
          <i class="ace-icon fa fa-info-circle blue"></i> You can also assign courses to teachers here.<br>
          <i class="ace-icon fa fa-info-circle blue"></i> Download sample file to use as template. 
          <a href="{{ URL::to( '/sample-files/sample-courses-upload.ods')  }}" target="_blank"><i class="fa fa-hand-o-right" aria-hidden="true"></i><strong style="color: #FF0000">Sample Bulk Upload Courses File</strong></a><br>
          <i class="ace-icon fa fa-info-circle blue"></i> Please use <strong style="color: #FF0000;">open office</strong> for bulk upload. Excel throws errors.
      </span>
  </div>
</div><!-- /.page-header -->

@include('flash::message')
@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
@endif
<h3> <i class="ace-icon fa fa-cloud-upload fa-2x"></i>
 Upload {{$term->term}} Courses for {{$group->name}}
</h3>
<div class="row">
    <div class="col-md-8">
        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('/schoolsetup/importcourses', [$group->id, $term->id]) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            <input type="file" name="import_file" /><br/>
                {{ csrf_field() }}
            <button class="btn btn-primary">Upload Courses</button>
        </form>
    </div>  
</div>
<hr>

<div class="row">
    
<div class="col-sm-8">
    <button id="addCourse-{{$schoolyear->id}}{{$term->id}}{{$group->id}}" class="btn btn-danger" data-toggle="tooltip" title="add a course" style="border-radius: 6px;">
        <i class="ace-icon fa fa-book align-top bigger-125"></i>
        <strong>Add a Course</strong>
    </button>
    @include('admin.superadmin.schoolsetup.courses.addCourseModal')
    <script type="text/javascript">
      $('#addCourse-{{$schoolyear->id}}{{$term->id}}{{$group->id}}').on('click', function(e){
         e.preventDefault();
        $('#addCourseModal-{{$schoolyear->id}}{{$term->id}}{{$group->id}}').modal('show');
      })
    </script>
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title">Showing {{$term->term}} Courses for {{$group->name}} </h4>
            <span class="widget-toolbar">
                <strong><a href="{{ URL::previous() }}">
                    <i class="ace-icon fa fa-arrow-left fa-2x"></i>
                    Back
                </a></strong>
            </span>
        </div>

        <div class="widget-body">
            <div class="widget-main">
        	   <table class="table table-striped table-bordered">
                    <thead>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Course Instructor</th>
                        <th>Assign/unAssign Instructor</th>
                        <th>Edit Course</th>
                        <th>Delete Course</th>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->name }}</td>
                            <td>
                                @foreach ($staffers->where('id', '=', $course->staffer_id) as $staffer)
                                    {{ @$staffer->first_name }} {{ @$staffer->last_name }}
                                 @endforeach
                            </td>
                            <td>
                                @if($course->staffer_id == null)
                                    <a  id="assignCourseToTeacher-{{$course->id}}" href="{{asset('/schoolsetup/assigncourse/'.$schoolyear->id) }}/{{$course->id}}/{{$course->group_id}}/{{$course->term_id}}" class="btn btn-info" role="button">
                                        <strong>Assign To an Instructor</strong>
                                    </a>
                                @else
                                <form class="form-group" action="{{ url('/schoolsetup/postunassigncourse', [$course->id] )}}" method="POST">
                                  {{ csrf_field() }}
                                  <input id="staffer_id" name="staffer_id" type="hidden" value="null">
                                  <input type="submit" value="usAssign this Instructor" style="color: red">
                                </form>
                                    
                                @endif
                            </td>
                             @include('admin.superadmin.schoolsetup.courses.assignCourseToTeacherModal')
                            <script type="text/javascript">
                              $('#assignCourseToTeacher-{{$course->id}}').on('click', function(e){
                                 e.preventDefault();
                                $('#assignCourseToTeacherModal-{{$course->id}}').modal('show');
                              })
                            </script>
                            <td>
                                <a href="{{asset('/schoolsetup/editcourse/'.$schoolyear->id) }}/{{$course->id}}/{{$term->id}}/{{$group->id}}">
                                    <i  id="editCourse-{{$schoolyear->id}}{{$term->id}}{{$group->id}}" class="fa fa-pencil-square-o fa-2x" aria-hidden="true" data-toggle="tooltip" title="edit course"></i>
                                </a>
                            </td>
                            @include('admin.superadmin.schoolsetup.courses.editCourseModal')
                            <script type="text/javascript">
                              $('#editCourse-{{$schoolyear->id}}{{$term->id}}{{$group->id}}').on('click', function(e){
                                 e.preventDefault();
                                $('#editCourseModal-{{$schoolyear->id}}{{$term->id}}{{$group->id}}').modal('show');
                              })
                            </script>
                            <td>
                                <a href="{{asset('/schoolsetup/postcoursedelete/'.$course->id) }}" onclick="return confirm('Are you sure you want to Delete this record?')">
                                    <i class="danger fa fa-trash-o fa-2x" aria-hidden="true" style="color:red"></i>
                                </a>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

</div>


<div class="hr hr-18 dotted hr-double"></div>
<br>

<div class="alert-danger">

	<ul>
		@foreach($errors->all() as $error)

			<li> {{ $error }}</li>

		@endforeach

	</ul>

</div>


@endsection
