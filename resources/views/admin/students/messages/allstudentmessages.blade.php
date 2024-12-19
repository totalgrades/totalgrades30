@extends('admin.dashboard')

@section('content')

        <div class="content">
          <div class="container-fluid">
            <div class="row">
                 @include('admin.includes.headdashboardtop')
            </div>
            @include('flash::message')
            <hr>

              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                          <h4 class="title"><strong>Messages Sent To <mark></mark>{{$student_user->name}}</s</strong>
                              <div class="pull-right">
                                  
                                  <a href="{{asset('/students/messages/showstudents/'.$schoolyear->id)}}/{{$term->id}}"><button type="button" class="btn btn-success">Send Message To Students</button></a>
                                  <a href="{{asset('/students/messages/allstudents/'.$schoolyear->id)}}/{{$term->id}}"><button type="button" class="btn btn-info">Back To message Board</button></a>
                              
                            </div>
                          </h4>
                          <p class="category">Your Current Class: {{ @\App\StafferRegistration::where('school_year_id', '=', $schoolyear->id)->where('term_id', '=', $term->id)->where('staffer_id', '=', $teacher->id)->first()->group->name}} </p>
                      </div>
                      <div class="content">
                       
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                          <thead>
                              <th><strong>#</strong></th>
                              <th><strong>Face</strong></th>
                              <th><strong>Sent To </strong></th>
                              <th><strong>Subject</strong></th>
                              <th class="text-center"><strong>Date Sent/Replied</strong></th>
                              <th class="text-center"><strong>View Message</strong></th>
                              <th class="text-center"><strong>Delete Message</strong></th>
                         </thead>
                          <tbody>

                            @foreach ($all_student_messages->where('staffer_id', $teacher->id)->where('staffer_delete', 0) as $key=> $message)
                            @if($message->status == 1)
                              <tr class="warning strikeout">
                            @else
                              <tr>
                            @endif
                                <td>{{ $key+1 }}</td>
                                <td><img class="avatar border-white" src="{{asset('assets/img/students/'.$message->user->avatar) }}" alt="..."/></td>
                                
                                <td>{{$message->user->name}}</td>
                                <td>{{str_limit($message->subject, 30)}}</td>
                                <td class="text-center">
                                  {{$message->created_at->toFormattedDateString()}}
                                  @if($message->message_replied == 1)
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                  @endif
                                </td>
                                <td class="text-center">
                                  @if($message->status == 1)
                                   
                                   <form  action="{{ url('/students/messages/postviewstudentmessage', [$schoolyear->id, $term->id, $message->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="status" value="1" >
                                    <button type="submit" class="btn btn-info")"><strike>VIEW MESSAGE</strike></button>
                                  </form>

                                  @else
                                  <form  action="{{ url('/students/messages/postviewstudentmessage', [$schoolyear->id, $term->id, $message->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="status" value="1" >
                                    <button type="submit" class="btn btn-info")">VIEW MESSAGE</button>
                                  </form>
                                 @endif
                                </td>
                                <td class="text-center">
                                  <form  action="{{ url('students/messages/deletemessageforstaffer', [$schoolyear->id, $term->id, $message->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="staffer_delete" value="1" >
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete this record?')">DELETE MESSAGE</button>
                                  </form>
                              
                                </td>
                              </tr>
                                
                            @endforeach
                          </tbody>
                          </table>
                          <div class="pagination">  </div>
                          </div>
                      </div>
   
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection