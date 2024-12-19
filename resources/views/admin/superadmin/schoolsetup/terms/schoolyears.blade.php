@extends('admin.superadmin.dashboard')

@section('content')
    <div class="page-header">
        <div class="alert alert-block alert-success">
            <i class="ace-icon fa fa-info-circle red"></i>
            <strong class="green">
                Step 2:
            </strong>
                Select a School Years<br>
            <span style="color: black">
                <i class="ace-icon fa fa-info-circle blue"></i> Make sure to select the current school year.<br>
                <i class="ace-icon fa fa-info-circle blue"></i> You can select past school years if you wish to edit terms in those school years
            </span>
        </div>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-sm-8">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><strong>Select a school year</strong></h4>
                    
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                	   <table class="table table-striped table-bordered">
                            <thead>
                                <th>#</th>
                                <th>School Year</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Select</th>
                               
                            </thead>
                            <tbody>

                                @foreach ($schoolyears as $key=>$schoolyear)

                                @if ($today->between($schoolyear->start_date, $schoolyear->show_until ))
                                <tr class="active">
                                @else
                                <tr class="warning">
                                @endif
                                    <td>{{$key+1}}</td>
                                    <td>
                                        @if ($today->between($schoolyear->start_date, $schoolyear->show_until ))
                                            <span style="color: #D15B47; font-weight: bold;">Current School Year:</span> {{ $schoolyear->school_year }}
                                        @else
                                            {{ $schoolyear->school_year }}
                                        @endif
                                    </td>
                                    <td>{{ $schoolyear->start_date->toFormattedDateString() }}</td>
                                    <td>{{ $schoolyear->end_date->toFormattedDateString() }}</td>
                                     <td>
                                        <a href="{{asset('/schoolsetup/showterms/'.$schoolyear->id) }}">
                                            @if ($today->between($schoolyear->start_date, $schoolyear->show_until ))
                                                <button type="button" class="btn btn-danger">
                                                    <strong>Select</strong>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-primary">
                                                    <strong><strike>Select</strike></strong>
                                                </button>
                                            @endif
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
