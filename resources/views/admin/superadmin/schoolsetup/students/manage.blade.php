@extends('admin.superadmin.dashboard')

@section('content')
<div class="page-header">
    <div class="alert alert-block alert-success">
        <i class="ace-icon fa fa-info-circle red"></i>       
        <strong class="green">
            Step 5:
        </strong>
            Manage Students<br>
        <span style="color: black">
            <i class="ace-icon fa fa-info-circle blue"></i> Manage your students from this dashboard.
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
<div class="row">
    <div class="col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h3 class="row orange">
                    <span class="col-sm-6">
                        <i class="ace-icon fa fa-users"></i>
                        <strong>All Students</strong>
                    </span>
                </h3>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <p class="muted">
                        Tight pants next level keffiyeh
                        <a title="Default tooltip" data-rel="tooltip" href="#">you probably</a>
                        haven't heard of them. Farm-to-table seitan, mcsweeney's fixie sustainable quinoa 8-bit american apparel
                        <a title="Another tooltip" data-rel="tooltip" href="#">have a</a>
                        terry richardson vinyl chambray. A really ironic artisan
                        <a data-rel="tooltip" href="#" data-original-title="Another one here too">whatever</a>
                        keytar, scenester farm-to-table banksy Austin
                        <a title="The last tip!" data-rel="tooltip" href="#">twitter</a>
                        handle.
                    </p>

                    <hr />

                    <p>
                        <a href="{{url('schoolsetup/students/viewallstudents')}}">
                            <span class="btn btn-warning btn-sm tooltip-warning" data-rel="tooltip" data-placement="left" title="View Students"><strong>VEIW ALL STUDENTS</strong></span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h3 class="row blue">
                    <span class="col-sm-6">
                        <i class="ace-icon fa fa-id-card"></i>
                        <strong>Register Students</strong>
                    </span>
                </h3>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <p class="muted">
                        Tight pants next level keffiyeh
                        <a title="Default tooltip" data-rel="tooltip" href="#">you probably</a>
                        haven't heard of them. Farm-to-table seitan, mcsweeney's fixie sustainable quinoa 8-bit american apparel
                        <a title="Another tooltip" data-rel="tooltip" href="#">have a</a>
                        terry richardson vinyl chambray. A really ironic artisan
                        <a data-rel="tooltip" href="#" data-original-title="Another one here too">whatever</a>
                        keytar, scenester farm-to-table banksy Austin
                        <a title="The last tip!" data-rel="tooltip" href="#">twitter</a>
                        handle.
                    </p>
                    <hr />
                    <p>
                        <span class="btn btn-info btn-sm tooltip-warning" data-rel="tooltip" data-placement="left" title="Register students"><strong>REGISTER STUDENTS</strong></span>
                    </p>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h3 class="row green">
                    <span class="col-sm-6">
                        <i class="ace-icon fa fa-user-plus"></i>
                        <strong>Add New Students</strong>
                    </span>
                </h3>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <p class="muted">
                        Tight pants next level keffiyeh
                        <a title="Default tooltip" data-rel="tooltip" href="#">you probably</a>
                        haven't heard of them. Farm-to-table seitan, mcsweeney's fixie sustainable quinoa 8-bit american apparel
                        <a title="Another tooltip" data-rel="tooltip" href="#">have a</a>
                        terry richardson vinyl chambray. A really ironic artisan
                        <a data-rel="tooltip" href="#" data-original-title="Another one here too">whatever</a>
                        keytar, scenester farm-to-table banksy Austin
                        <a title="The last tip!" data-rel="tooltip" href="#">twitter</a>
                        handle.
                    </p>

                    <hr />

                    <p>
                        <a href="{{asset('/schoolsetup/students/addnewstudents') }}" id="uploadStudents">
                            <span class="btn btn-success btn-sm tooltip-success" data-rel="tooltip" data-placement="right" title="Right Success"><strong> <i class="ace-icon fa fa-cloud-upload fa-2x"></i> UPLOAD STUDENTS</strong>
                            </span>
                        </a>
                        
                        <a href="{{asset('/schoolsetup/students/addnewstudents') }}" id="addStudent">
                            <span class="btn btn-danger btn-sm tooltip-success" data-rel="tooltip" data-placement="right" title="Right Success"><strong> <i class="ace-icon fa fa-plus fa-2x"></i> ADD A STUDENT</strong>
                            </span>
                        </a>
                    </p>
                    @include('admin.superadmin.schoolsetup.students.uploadStudentsModal')
                    <script type="text/javascript">
                      $('#uploadStudents').on('click', function(e){
                         e.preventDefault();
                        $('#uploadStudentsModal').modal('show');
                      })
                    </script>
                    @include('admin.superadmin.schoolsetup.students.addStudentModal')
                    <script type="text/javascript">
                      $('#addStudent').on('click', function(e){
                         e.preventDefault();
                        $('#addStudentModal').modal('show');
                      })
                    </script>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->

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
