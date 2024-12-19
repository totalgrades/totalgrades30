				 <div class="panel-body">  
				 <div class="col-md-4 ">

                    
                    <ul class="list-group">
						  <li class="list-group-item justify-content-between">
						    Name:&nbsp;&nbsp;
						    <span class="label label-primary pull-right">{{$student->first_name}} {{$student->last_name}}</span>
						  </li>
						  <li class="list-group-item justify-content-between">
						    Age
						    <span class="label label-primary pull-right">{{ $student->dob->diffInYears($today) }}</span>
						  </li>
						  <li class="list-group-item justify-content-between">
						    Admission #: 
						    <span class="label label-primary pull-right">{{ $student->registration_code }}</span>
						  </li>
					</ul>
					

                  </div>{{-- biodata-1 --}}
                  <div class="col-md-4 ">
                       
                       	<ul class="list-group">
						  <li class="list-group-item justify-content-between">
						    Sex:
						    <span class="label label-primary pull-right">{{ $student->gender}}</span>
						  </li>
						  <li class="list-group-item justify-content-between">
						    # of students in class:
						    <span class="label label-primary pull-right">{{$students_all->count()}}</span>
						  </li>
						  <li class="list-group-item justify-content-between">
						    Admission Date: 
						    <span class="label label-primary pull-right">{{ $student->date_enrolled }}</span>
						  </li>
					</ul>

                  </div>{{-- biodata-2 --}}
                  <div class="col-md-4 ">
                       
                       	<ul class="list-group">
						  <li class="list-group-item justify-content-between">
						    Teacher:&nbsp;&nbsp;
						    <span class="label label-primary pull-right">{{ @$student_teacher->staffer->first_name }}&nbsp;&nbsp;{{ @$student_teacher->staffer->last_name }}</span>
						  </li>
						  <li class="list-group-item justify-content-between">
						    Class:
						    <span class="label label-primary pull-right">{{ @$student_group->group->name }}</span>
						  </li>
						  @if($course_grades->count() != null)
						  <li class="list-group-item justify-content-between">
						    Overall &#37;: 
						    <span class="label label-primary pull-right">{{ number_format($course_grades->sum('total')/$course_grades->count()),2 }} &#37;</span>
						  </li>
						  @else
						  <li class="list-group-item justify-content-between">
						    Overall &#37;: 
						    <span class="label label-primary pull-right"> 0% &#37;</span>
						  </li>

						  @endif
                  </div>{{-- biodata-2 --}}
                  </div>