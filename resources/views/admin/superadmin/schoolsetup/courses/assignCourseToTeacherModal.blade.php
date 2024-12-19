<!-- The Modal -->
<div class="modal fade" id="assignCourseToTeacherModal-{{$course->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #7FB3D5; color: #FFF">
              <h4 class="modal-title"><strong>Add Course Form</strong></h4>
              <h5 class="modal-title"><strong>School year: {{$schoolyear->school_year}}</strong></h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="widget-body">
                    <div class="widget-main">
                        <form class="form-group" action="{{ url('/schoolsetup/postassigncourse', [$schoolyear->id, $course->id, $course->group_id, $course->term_id] )}}" method="POST">
                                            {{ csrf_field() }}
                                        

                                        <ul class="list-group">
                                             <li class="list-group-item justify-content-between active">
                                            Course Details
                                           
                                          <li class="list-group-item justify-content-between">
                                            <strong>Course Code</strong>
                                            <span class="badge badge-default badge-pill">{{$course->course_code}}</span>
                                          </li>
                                          <li class="list-group-item justify-content-between">
                                            <strong>Course Name</strong>
                                            <span class="badge badge-default badge-pill">{{$course->name}}</span>
                                          </li>
                                          <li class="list-group-item justify-content-between">
                                            <strong>Class</strong>
                                            <span class="badge badge-default badge-pill">{{$group->name}}</span>
                                          </li>
                                          <li class="list-group-item justify-content-between">
                                            <strong>Term</strong>
                                            <span class="badge badge-default badge-pill">{{$term->term}}</span>
                                          </li>
                                        </ul>
                                    
                                        <div>
                                            <label for="form-field-select-3">Select an Instructor</label>

                                            <br />
                                  
                                            <select name="staffer_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Select an Instructor...">
                                                <option selected disabled>Please select one option</option>
                                                    @foreach($teachers as $key => $teacher)

                                                        <option value="{{ $teacher->id }}" >
                                                            {{ $teacher->first_name }} {{ $teacher->last_name }}
                                                        </option>

                                                    @endforeach
                                            </select>

                                        </div>
                                        <div class="form-actions center">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <strong>Assign Selected Instructor to Course</strong>
                                                <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                            </button>
                                        </div>

                                    </div>
                                </form>
                    </div>
                </div>  
            </div>      
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
            
        </div>
    </div>
</div>