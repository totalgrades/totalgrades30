<!-- The Modal -->
  <div class="modal fade" id="editSchoolModal-{{ $school->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #7FB3D5; color: #FFF"">
          <h4 class="modal-title"><strong>Edit School Form</strong></h4>
          <hr>
          <h5 class="modal-title">Editing {{ $school->name }}</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="widget-body">
              <div class="widget-main">
                  <form class="form-group" action="{{ url('/schoolsetup/schools/postschoolupdate', [$school->id]) }}" method="POST">
                            
                      {{ csrf_field() }}

                   <label for="school-year"><strong>School Name</strong></label>

                       <div class="row">
                          <div class="col-xs-8 col-sm-11">
                              <div class="input-group">
                                  <input class="form-control" id="name" type="text" name="name" value="{{$school->name}}" />
                                  <span class="input-group-addon">
                                      <i class="fa fa-user bigger-110"></i>
                                  </span>
                              </div>
                          </div>
                      </div>

                      <hr />
                      
                      <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <label for="school-address"><strong>School Address</strong></label>
                            <textarea id="form-field-11" class="autosize-transition form-control" name="address" >{{$school->address}}</textarea>
                        </div>
                      </div>
                      

                      <hr />

                       <label for="school-year"><strong>City</strong></label>

                      <div class="row">
                          <div class="col-xs-8 col-sm-11">
                              <div class="input-group">
                                  <input class="form-control" id="city" type="text" name="city" value="{{$school->city}}"/>
                                  <span class="input-group-addon">
                                      <i class="fa fa-map bigger-110"></i>
                                  </span>
                              </div>
                          </div>
                      </div>

                      <hr />

                      <label for="school-year"><strong>State</strong></label>

                      <div class="row">
                          <div class="col-xs-8 col-sm-11">
                              <div class="input-group">
                                  <input class="form-control" id="state" type="text" name="state" value="{{$school->state}}"/>
                                  <span class="input-group-addon">
                                      <i class="fa fa-map bigger-110"></i>
                                  </span>
                              </div>
                          </div>
                      </div>

                      <hr />

                     
                      <label for="school-year"><strong>Postal Code</strong></label>

                      <div class="row">
                          <div class="col-xs-8 col-sm-11">
                              <div class="input-group">
                                  <input class="form-control" id="postal_code" type="text" name="postal_code" value="{{$school->postal_code}}"/>
                                  <span class="input-group-addon">
                                      <i class="fa fa-id-card-o bigger-110"></i>
                                  </span>
                              </div>
                          </div>
                      </div>

                      <hr />

                      <label for="school-year"><strong>Phone</strong></label>

                      <div class="row">
                          <div class="col-xs-8 col-sm-11">
                              <div class="input-group">
                                  <input class="form-control" id="phone" type="text" name="phone" value="{{$school->phone}}"/>
                                  <span class="input-group-addon">
                                      <i class="fa fa-phone bigger-110"></i>
                                  </span>
                              </div>
                          </div>
                      </div>

                      <hr />

                     

                       <label for="school-year"><strong>Email</strong></label>

                      <div class="row">
                          <div class="col-xs-8 col-sm-11">
                              <div class="input-group">
                                  <input class="form-control" id="email" type="email" name="email" value="{{$school->email}}" />
                                  <span class="input-group-addon">
                                      <i class="fa fa-user-o bigger-110"></i>
                                  </span>
                              </div>
                          </div>
                      </div>

                      <hr />

                      <div class="row">
                          <div class="col-xs-8 col-sm-11">

                            <label for="school-motto"><strong>New School Motto</strong></label>
                            <textarea id="form-field-11" class="autosize-transition form-control" name="motto" >{{$school->motto}}</textarea>
                          </div>
                      </div>

                      <hr />

                      <div class="clearfix form-actions">
                          <div class="col-md-offset-3 col-md-9">
                             <button type="submit" class="btn btn-primary">Submit Form</button>
                              &nbsp; &nbsp; &nbsp;
                              <button class="btn btn-warning" type="reset">
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