<!-- The Modal -->
<div class="modal fade" id="addStudentModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #7FB3D5; color: #FFF">
              <h4 class="modal-title"><strong>Add a Student</strong></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <hr>
              <h5 class="modal-title">
                <div class="alert alert-info">
                    <strong>Use this form to add one student at a time. Student will be added to your school's database when submitted.</strong> 
                </div>
              </h5>
            </div>            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="widget-body">
                    <div class="widget-main">
                        <form class="form-group" action="{{ url('/schoolsetup/students/postaddnewstudents') }}" method="POST">
                
                            {{ csrf_field() }}

                            <div class="widget-body">
                                <div class="widget-main">

                                <div class="form-group">
                                <label for="Student Number"><strong>Student # </strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control col-xs-10 col-sm-5" id="student_number" type="text" name="student_number" required=""/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-id-card bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <hr />

                                    <label for="Reg Key"><strong>Registration Key</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control" id="registration_code" type="text" name="registration_code" required="required" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-key bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                 <label for="First Name"><strong>First name</strong></label>

                                     <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control" id="first_name" type="text" name="first_name" required="required" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <label for="Last Name"><strong>Last name</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control" id="last_name" type="text" name="last_name" required="required" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user-o bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />



                                    <label for="Gender"><strong>Gender</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control" id="gender" type="text" name="gender" required="required" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-genderless custom bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                 <label for="Date of Birth"><strong>Date of Birth</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control date-picker" id="dob" 
                                               name="dob" type="text" data-date-format="yyyy-mm-dd" required="required"/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />


                                <label for="Date Enrolled"><strong>Enrollment Date</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control date-picker" id="date_enrolled" 
                                               name="date_enrolled" type="text" data-date-format="yyyy-mm-dd"/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <label for="Nationality"><strong>Nationality</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control" id="nationality" type="text" name="nationality" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-flag bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <label for="Id card Number"><strong>ID Card #</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control" id="national_card_number" type="" name="national_card_number" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-address-card bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <label for="Passport Number"><strong>Passport #</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control" id="passport_number" type="text" name="passport_number"/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-id-card-o bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <label for="phone"><strong>Parent Phone</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control" id="phone" type="text" name="phone" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <label for="email"><strong>Parent Email</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control" id="parent_email" type="email" name="email" required="" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <label for="State"><strong>State</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                            <div class="input-group">
                                                <input class="form-control" id="state" type="text" name="state"/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-map bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <label for="Address"><strong>Address</strong></label>

                                    <div class="row">
                                        <div class="col-xs-8 col-sm-11">
                                      
                                        <textarea id="form-field-11" class="autosize-transition form-control" name="current_address"></textarea>
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