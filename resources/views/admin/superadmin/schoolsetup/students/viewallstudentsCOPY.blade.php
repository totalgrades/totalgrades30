@extends('admin.superadmin.dashboard')

@section('content')
<div class="page-header">
    <div class="alert alert-block alert-success">
        <i class="ace-icon fa fa-info-circle red"></i>    
        <strong class="green">
            Students Table<br>
        </strong>
        <span style="color: black">
            <i class="ace-icon fa fa-info-circle blue"></i> This table shows all the students, past and present, in your school's database
        </span>
    </div>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Showing all students in Your School </h4>
                <span class="widget-toolbar">
                    <a href="">
                        <i class="ace-icon fa fa-users"></i>
                        of students: 
                    </a>
                </span>                                               
            </div>

            <div class="widget-body">
                <div class="widget-main">

            	   <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <th>#</th>
                            <th>Student #</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>DoB</th>
                            <th>Status</th>
                            <th>Parent Phone</th>
                            <th>Parent Email</th>
                            <th>State</th>                                               
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($students as $key=>$student)

                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <strong>
                                        <a href="{{asset('/schoolsetup/students/studentdetails/'.$student->id) }}">
                                        {{ $student->student_number }}
                                        </a>
                                    </strong>
                                </td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->dob->toFormattedDateString() }}</td>
                                <td>
                                    @if($student->date_graduated != null)
                                        Graduated: {{$student->date_graduated}}
                                    @elseif($student->date_unenrolled != null)
                                        UnEnrolled {{$student->date_unenrolled}}
                                    @else
                                        Enrolled {{$student->date_enrolled}}
                                    @endif
                                </td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->state }}</td>
                                
                                <td><strong><a href="{{asset('/schoolsetup/students/editstudent/'.$student->id) }}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true">                                                           
                                </i></a></strong>
                                </td>
                                <td><strong><a href="{{asset('/schoolsetup/students/poststudentdelete/'.$student->id) }}" onclick="return confirm('Are you sure you want to Delete this record?')"><i class="fa fa-trash fa-2x" aria-hidden="true">                                                           
                                </i></a></strong>
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
@endsection
