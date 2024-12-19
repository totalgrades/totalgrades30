<!-- The Modal -->
<div class="modal fade" id="addCourseModal-{{$schoolyear->id}}{{$term->id}}{{$group->id}}">
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
                        <form class="form-group" action="{{ url('/schoolsetup/postcourse', [ $schoolyear->id, $term->id, $group->id]) }}" method="POST">

                            {{ csrf_field() }}

                            <label for="school-year">Term : {{$term->term}}</label>

                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        
                                        <input class="form-control" id="term_id" type="hidden" name="term_id" value="{{$term->id}}" />
                                        
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <label for="school-year">Group: {{$group->name}}</label>

                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        
                                        <input class="form-control" id="group_id" type="hidden" name="group_id" value="{{$group->id}}" />
                                        
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <label for="school-year">Course Code</label>

                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        
                                        <input class="form-control" id="course_code" type="text" name="course_code" placeholder="eg. ENG3B6B"  required="" />
                                        
                                    </div>
                                </div>
                            </div>

                            <hr />


                            <label for="school-year">Course Name</label>

                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        
                                        <input class="form-control" id="course" type="text" name="name" placeholder="eg. English"  required="" />
                                        
                                    </div>
                                </div>
                            </div>

                            <hr />

                            
                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    
                                    <input type="submit" value="Submit">

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        Reset
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