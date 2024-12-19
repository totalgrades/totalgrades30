@extends('admin.superadmin.dashboard')
@section('content')
<div class="page-header">
    <div class="alert alert-block alert-success">
        <i class="ace-icon fa fa-info-circle red"></i>
        
        <strong class="green">
            Step 0:
        </strong>
            Add Your School<br>
        <span style="color: black">
            <i class="ace-icon fa fa-info-circle blue"></i> please note that you can only add one school. This version does not support multiple schools.
        </span>
    </div>  
</div><!-- /.page-header -->
@include('flash::message')
@if($schools->count() < 1)
<button id="addNewSchool" class="btn btn-danger" data-toggle="tooltip" title="You can only add one school. This version does not support multiple schools." style="border-radius: 6px;">
    <i class="ace-icon fa fa-university align-top bigger-125"></i>
    <strong>Add Your School</strong>
</button>
@endif
@include('admin.superadmin.schoolsetup.schools.addSchoolModal')
<script type="text/javascript">
  $('#addNewSchool').on('click', function(e){
     e.preventDefault();
    $('#addNewSchoolModal').modal('show');
  })
</script>

<div class="row">
    <div class="col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><strong>Your School</strong></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                   <table class="table table-striped table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>                        
                        </thead>
                        <tbody>
                        @foreach ($schools as $key=>$school)
                            <tr>  
                                <td>{{ @$key+1}}</td>
                                <td><a href="{{asset('/schoolsetup') }}" data-toggle="tooltip" title="View school information">{{ @$school->name}} <i class="ace-icon fa fa-external-link red"></i></a></td>
                                <td>
                                    <strong>
                                        <a href="{{asset('/schoolsetup/schools/editschool/'.@$school->id) }}">
                                            <i id="editSchoolIcon-{{ $school->id }}" class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </strong>
                                </td>
                                @include('admin.superadmin.schoolsetup.schools.editSchoolModal')
                                <script type="text/javascript">
                                  $('#editSchoolIcon-{{ $school->id }}').on('click', function(e){
                                     e.preventDefault();
                                    $('#editSchoolModal-{{ $school->id }}').modal('show');
                                  })
                                </script>
                                <td><strong><a href="{{asset('/schoolsetup/schools/postschooldelete/'.@$school->id) }}" onclick="return confirm('Are you sure you want to Delete this record?')"><i class="danger fa fa-trash-o fa-2x" aria-hidden="true" style="color:red"></i></a></strong>
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
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@endsection
