@extends('admin.superadmin.dashboard')

@section('content')

<div class="page-header">
  <div class="alert alert-block alert-success">
      <i class="ace-icon fa fa-info-circle red"></i>
      <strong class="green">
          Bulk upload {{$schoolyear->school_year}} {{$term->term}} courses for all groups<br>
      </strong>
      <span style="color: black">
          <i class="ace-icon fa fa-info-circle blue"></i> You can also select a group to upload courses for that group<br>
          <i class="ace-icon fa fa-info-circle blue"></i> Download sample file to use as template. <a href="{{ URL::to( '/sample-files/sample-BULK_courses-upload.ods')  }}" target="_blank"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i><strong style="color: #FF0000">Sample Bulk Upload Courses File</strong></a><br>
          <i class="ace-icon fa fa-info-circle blue"></i> You can also download your groups table. <a href="{{ URL::to('/schoolsetup/staffers/downloadExcelGroups/xls') }}"><button class="btn btn-danger">Download Groups xls</button></a><br>
          <i class="ace-icon fa fa-info-circle blue"></i> Please use <strong style="color: #FF0000;">open office</strong> for bulk upload. Excel throws errors.
      </span>
  </div>
</div><!-- /.page-header -->

@include('flash::message')

<div class="row">

  <div class="col-md-5">
    <h4>
      <i class="ace-icon fa fa-cloud-upload fa-2x"></i> Bulk uploud courses                                 
    </h4>
    <form style="border: 4px solid #a1a1a1; padding: 20px;" action="{{ URL::to('/schoolsetup/showcoursesgroups/bulkuploadcourses', [$schoolyear->id, $term->id] ) }}" class="form-horizontal" method="post" enctype="multipart/form-data">

      <input type="file" name="import_file" />
      {{ csrf_field() }}
      <br/>
      <button class="btn btn-primary"> <i class="ace-icon fa fa-cloud-upload"></i> Upload</button>
      <hr>
      Bulk upload {{$schoolyear->school_year}} {{$term->term}} courses for all groups in one file
    </form>
     
  </div>
  <div class="col-md-1">
    <span>
      <h1 style="margin-top: 80px;">OR</h1>
    </span>
  </div>
  <div class="col-md-6">
    <h4>
      <i class="ace-icon fa fa-check-circle fa-2x"></i> Select a group                        
    </h4>
    <div class="alert alert-warning" style="border: 4px solid #a1a1a1; padding: 20px;">
      <button id="selectGroup-{{$schoolyear->id}}-{{$term->id}}" type="button" class="btn btn-pink"> <i class="ace-icon fa fa-check-circle"></i> Select a Group</button>
      <hr >
      Select a group to upload {{$schoolyear->school_year}} {{$term->term}} courses for the group selected or add one course at a time.      
    </div>
    @include('admin.superadmin.schoolsetup.courses.selectGroupModal')
    <script type="text/javascript">
      $('#selectGroup-{{$schoolyear->id}}-{{$term->id}}').on('click', function(e){
         e.preventDefault();
        $('#selectGroupModal-{{$schoolyear->id}}-{{$term->id}}').modal('show');
      })
    </script>
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

<!-- hide download csv, xls     
<div class="row">
  <div class="col-md-6">
    <div class="alert alert-info">
      <h5 style="">
      <strong>Downlod Staffers and Registration Codes: <br>
        <a href="{{ URL::to('/schoolsetup/staffers/downloadExcelStaffers/xls') }}"><button class="btn btn-success">Download Staffers xls</button></a>
        <a href="{{ URL::to('/schoolsetup/staffers/downloadExcelStaffers/xlsx') }}"><button class="btn btn-success">Download Staffers xlsx</button></a>
        <a href="{{ URL::to('/schoolsetup/staffers/downloadExcelStaffers/csv') }}"><button class="btn btn-success">Download Staffers CSV</button></a> 
      </strong><br><br>
      <strong>Download Groups and Group Names: <br>
        <a href="{{ URL::to('/schoolsetup/staffers/downloadExcelGroups/xls') }}"><button class="btn btn-danger">Download Groups xls</button></a>
        <a href="{{ URL::to('/schoolsetup/staffers/downloadExcelGroups/xlsx') }}"><button class="btn btn-danger">Download Groups xlsx</button></a>
        <a href="{{ URL::to('/schoolsetup/staffers/downloadExcelGroups/csv') }}"><button class="btn btn-danger">Download Groups CSV</button></a>
         
      </strong>
    </h5>
    </div>
  </div>
</div>
    


<h1 class="display-1">OR</h1>

<div class="row">
    <div class="col-sm-4">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Selct a group from the list below </h4>
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
                            <th>#</th>
                            <th>Group Name</th>
                            <th>Term</th>
                            <th># of Courses</th>
                            <th>Select</th>
                            
                            
                        </thead>
                        <tbody>
                        
                            @foreach ($groups as $key=>$group)
                                @if($group->name != 'Admin')
                            <tr>
                                <td>{{ $key}}</td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $term->term }}</td>
                                <td>{{$group->courses()->where('term_id', '=', $term->id)->count()}}</td>                                                       
                                <td><strong><a href="{{asset('/schoolsetup/showcourses/'.$schoolyear->id) }}/{{$term->id}}/{{$group->id}}"><i class="fa fa-check-square fa-2x" aria-hidden="true"></i></a></strong>
                                </td>
                            </tr>
                                @endif
                         @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
--> 

@endsection
