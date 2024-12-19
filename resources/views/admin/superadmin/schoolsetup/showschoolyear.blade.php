@extends('admin.superadmin.dashboard')
@section('content')   
<div class="page-header">
    <div class="alert alert-block alert-success">
        <i class="ace-icon fa fa-info-circle red"></i>
        
        <strong class="green">
            Step 1:
        </strong>
            Edit School Years<br>
        <span style="color: black">
            <i class="ace-icon fa fa-info-circle blue"></i> You can add school years here. <br>
            <i class="ace-icon fa fa-info-circle blue"></i> Expample school years are provided.<br>
            <i class="ace-icon fa fa-info-circle blue"></i> You can delete them or you can edit them as needed to conform with your school.
        </span>
    </div>
</div><!-- /.page-header -->
<button id="addSchoolYear" class="btn btn-danger" data-toggle="tooltip" title="add new school year" style="border-radius: 6px;">
    <i class="ace-icon fa fa-list align-top bigger-125"></i>
    <strong>New School Year</strong>
</button>
@include('admin.superadmin.schoolsetup.addSchoolYearModal')
<script type="text/javascript">
  $('#addSchoolYear').on('click', function(e){
     e.preventDefault();
    $('#addSchoolYearModal').modal('show');
  })
</script>
<div class="row">
    <div class="col-sm-8">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><strong>School Years</strong>
                </h4>
                
            </div>

            <div class="widget-body">
                <div class="widget-main">

            	    <table class="table table-striped table-bordered">
                        <thead>
                            <th>#</th>
                            <th>School Year</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Show Until</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </thead>
                        <tbody>

                            @foreach($schoolyears as $key=>$schoolyear )
                                @if ($today->between($schoolyear->start_date, $schoolyear->show_until ))
                                <tr class="active">
                                @else
                                <tr class="warning">
                                @endif
                                
                                <td>{{$key+1}}</td>
                                <td>
                                    @if ($today->between($schoolyear->start_date, $schoolyear->show_until ))
                                        <span style="color: green; font-weight: bold;">Current Year:</span> {{ $schoolyear->school_year }}
                                    @else
                                        {{ $schoolyear->school_year }}
                                    @endif
                                </td>
                                <td>{{ $schoolyear->start_date->toFormattedDateString() }}</td>
                                <td>{{ $schoolyear->end_date->toFormattedDateString() }}</td>
                                <td>{{ $schoolyear->show_until->toFormattedDateString() }}</td>
                                <td>
                                    <strong>
                                        <a href="{{asset('/schoolsetup/editschoolyear/'.$schoolyear->id) }}">
                                            <i id="editSchoolYear-{{$schoolyear->id}}" class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </strong>
                                </td>
                                @include('admin.superadmin.schoolsetup.editSchoolYearModal')
                                <script type="text/javascript">
                                  $('#editSchoolYear-{{$schoolyear->id}}').on('click', function(e){
                                     e.preventDefault();
                                    $('#editSchoolYearModal-{{$schoolyear->id}}').modal('show');
                                  })
                                </script>
                                <td>
                                    <strong>
                                        <a href="{{asset('/schoolsetup/deleteschoolyear/'.$schoolyear->id) }}" onclick="return confirm('Are you sure you want to Delete this record?')">
                                            <i class="fa fa-trash fa-2x" aria-hidden="true" style="color: red"></i>
                                        </a>
                                    </strong>
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
