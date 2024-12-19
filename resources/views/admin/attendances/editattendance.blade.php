@extends('admin.dashboard')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                     @include('admin.includes.headdashboardtop')
                </div>
                <div class="row">

                  @include('flash::message')
                  <hr>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Adding Attendance</h4>
                                <p class="category">for {{$attendance->student->first_name}} {{$attendance->student->last_name}}</p>
                            </div>
                              <hr>
                            <div class="content">
                              <form class="form-group" action="{{ url('/attendances/postattendanceupdate', [Crypt::encrypt($attendance->id), $schoolyear->id, $term->id]) }}" method="POST">
                              {{ csrf_field() }}
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>
                                                    @foreach ($all_users as $st_user)

                                                      @if ($st_user->registration_code == $attendance->student->registration_code)

                                                        
                                                          <strong>
                                                          <img class="avatar border-white" src="{{asset('assets/img/students/'.$st_user->avatar) }}" alt="..."/>
                                                          {{$attendance->student->first_name}} {{$attendance->student->last_name}} 
                                                          </strong>
                                                      @endif
                                                    @endforeach
                                                  </label>
                                                  <input type="hidden" class="form-control border-input" name="student_id" value="{{$attendance->student_id}}">
                                              </div>
                                          </div>
                                          
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label><strong>{{$current_term->term}}</strong></label>
                                                  <input type="hidden" class="form-control border-input" name="term_id" value="{{$current_term->id}}" >
                                              </div>
                                          </div>
                                         
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label><strong>{{$today->toFormattedDateString()}}</strong></label>
                                                  <input type="hidden" name="day" class="form-control border-input" value="{{$today}}">
                                              </div>
                                          </div>
                                        </div> 
                                      
                                        <hr>
                                                                 
                                      
                                      <div class="text-center">
                                      

                                          <label class="label-danger"><h5 style="color: #FFF;">Please select a new Attendance code</h5></label>
                                            
                                         
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  
                                                  <select name="attendance_code_id" id="attendance_code_id">
                                                      <option selected disabled>Please select one option</option>
                                                            @foreach($attendancecodes as $key => $attendancecode)

                                                                <option value="{{ $attendancecode->id }}" >
                                                                    {{ $attendancecode->code_name }}
                                                                </option>

                                                            @endforeach
                                                    </select>
                                              </div>
                                          </div>
                                        </div>

                                          
                                          
                                        <div class="col-md-12">
                                        <div class="text-center">
                                          <div class="form-group">

                                            <div class="well">

                                              <h4> Current Teacher's comment</h4>
                                              {{$attendance->teacher_comment}}
                                              
                                            </div>
                                            <label for="exampleTextarea">Update Attendance Comment for {{ $attendance->student->first_name }} {{ $attendance->student->last_name }}</label>
                                            <textarea class="form-control" name="teacher_comment" id="teacher_comment" rows="3"></textarea>
                                          </div>
                                                                                    
                                      </div>
                                      </div>


                                     
                                     <div class="clearfix"></div>
                                                                     
                                      <div class="text-center">
                                          <input type="submit" value="Submit">
                                      </div>
                                      <div class="clearfix"></div>
                                  </form>
                                  
                                  <hr>

                                  

                                  <div class="alert-danger">
                            
                                      <ul>
                                        @foreach($errors->all() as $error)

                                          <li> {{ $error }}</li>

                                        @endforeach

                                      </ul>

                                  </div>
                                    
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                </div>
            </div>
        </div>

@endsection
