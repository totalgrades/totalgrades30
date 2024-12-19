@extends('admin.superadmin.dashboard')

@section('content')

<div class="page-header">
    <div class="alert alert-block alert-success">
        <i class="ace-icon fa fa-info-circle red"></i>
        
        <strong class="green">
            Step 2: 
        </strong>
            Add/Edit Terms<br>
        <span style="color: black">
            <i class="ace-icon fa fa-info-circle blue"></i> You can add, edit or delete terms for the school year selected
        </span>
    </div>
</div><!-- /.page-header -->
@include('flash::message')
<button id="addTerm-{{$schoolyear->id}}" class="btn btn-danger" data-toggle="tooltip" title="add a new term" style="border-radius: 6px;">
    <i class="ace-icon fa fa-text-width align-top bigger-125"></i>
    <strong>New Term</strong>
</button>

@include('admin.superadmin.schoolsetup.terms.addTermModal')
<script type="text/javascript">
  $('#addTerm-{{$schoolyear->id}}').on('click', function(e){
     e.preventDefault();
    $('#addTermModal-{{$schoolyear->id}}').modal('show');
  })
</script>
<div class="row">
    <div class="col-sm-8">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">
                    <strong>School Year: <span>{{$schoolyear->school_year}}</span></strong> 
                </h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">

            	   <table class="table table-striped table-bordered">
                        <thead>
                            <th>Term</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Show Until</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </thead>
                        <tbody>
                            @foreach ($schoolyear_terms as $term)

                            @if ($today->between($term->start_date, $term->show_until ))
                            <tr class="active">
                            @else
                            <tr class="warning">
                            @endif
                                <td>
                                    @if ($today->between($term->start_date, $term->show_until ))
                                        <span style="color: #D15B47; font-weight: bold;">Current:</span> 
                                        {{ $term->term }}
                                    @else
                                        {{ $term->term }}
                                    @endif
                                </td>
                                <td>{{ $term->start_date->toFormattedDateString() }}</td>
                                <td>{{ $term->end_date->toFormattedDateString() }}</td>
                                <td>{{ $term->show_until->toFormattedDateString() }}</td>
                                <td>
                                    <strong>
                                        <a href="{{asset('/schoolsetup/editterm/'.$schoolyear->id) }}/{{$term->id}}"><i id="editTerm-{{$term->id}}" class="fa fa-pencil-square-o fa-2x" aria-hidden="true" data-toggle="tooltip" title="edit {{$term->term}}"></i>
                                        </a>
                                    </strong>
                                </td>

                                @include('admin.superadmin.schoolsetup.terms.editTermModal')
                                <script type="text/javascript">
                                  $('#editTerm-{{$term->id}}').on('click', function(e){
                                     e.preventDefault();
                                    $('#editTermModal-{{$term->id}}').modal('show');
                                  })
                                </script>
                                <td>
                                    <a href="{{asset('/schoolsetup/posttermdelete/'.$term->id) }}" onclick="return confirm('Are you sure you want to Delete this record?')">
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
