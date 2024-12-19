@extends('admin.superadmin.dashboard')

@section('content')


    <div class="page-header">
        <div class="alert alert-block alert-success">
            <i class="ace-icon fa fa-info-circle red"></i>
            <strong class="green">
                Step 3:
            </strong>
                Add/Edit/Delete Groups<br>
            <span style="color: black">
                <i class="ace-icon fa fa-info-circle blue"></i> Groups are Classes. eg Basic 1A, Class 1A, etc<br>
                <i class="ace-icon fa fa-info-circle blue"></i> You can add, edit, or delete groups/classes here
            </span>
        </div>
    </div><!-- /.page-header -->
    @include('flash::message')
    <button id="addGroup" class="btn btn-danger" data-toggle="tooltip" title="add a new group/class" style="border-radius: 6px;">
        <i class="ace-icon fa fa-object-group align-top bigger-125"></i>
        <strong>New Group/Class</strong>
    </button>

    @include('admin.superadmin.schoolsetup.groups.addGroupModal')
    <script type="text/javascript">
      $('#addGroup').on('click', function(e){
         e.preventDefault();
        $('#addGroupModal').modal('show');
      })
    </script>
    <div class="row">
        <div class="col-sm-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Showing All Groups </h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                	   <table class="table table-striped table-bordered">
                            <thead>
                                <th>Group Name</th>
                                <th>Group ID</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    @if($group->name != "Admin")
                                        <tr>
                                            <td>{{ $group->name }}</td>
                                            <td>{{ $group->id }}</td>
                                            <td>
                                                <a href="{{asset('/schoolsetup/editgroup/'.$group->id) }}">
                                                    <i id="editGroup-{{$group->id}}" class="fa fa-pencil-square-o fa-2x" aria-hidden="true" data-toggle="tooltip" title="edit group/class"></i>
                                                </a> 
                                            </td>
                                            @include('admin.superadmin.schoolsetup.groups.editGroupModal')
                                            <script type="text/javascript">
                                              $('#editGroup-{{$group->id}}').on('click', function(e){
                                                 e.preventDefault();
                                                $('#editGroupModal-{{$group->id}}').modal('show');
                                              })
                                            </script>
                                            <td>
                                                <a href="{{asset('/schoolsetup/postgroupdelete/'.$group->id) }}" onclick="return confirm('Are you sure you want to Delete this record?')">
                                                    <i class="danger fa fa-trash-o fa-2x" aria-hidden="true" style="color:red"></i>
                                                </a>
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
