<!-- The Modal -->
  <div class="modal fade" id="addSchoolYearModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #D15B47; color: #FFF">
          <h4 class="modal-title"><strong>New School Year Form</strong></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
            <div class="widget-body">
                <div class="widget-main">
                  <form class="form-group" action="{{ url('/schoolsetup/postaddschoolyear')}}" method="POST">
                            
                {{ csrf_field() }}

                    <label for="school-year">School Year (eg. 2016/2017)</label>

                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                
                                <input class="form-control" id="school_year" type="text" name="school_year" placeholder="eg. 2017/2018" required="" />
                                
                            </div>
                        </div>
                    </div>

                    <hr />

                    <label for="id-date-picker-1">Start Date (yyyy-mm-dd)</label>

                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="start_date" required=""/>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <label for="id-date-picker-1">End Date (yyyy-mm-dd)</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="end_date" required="" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <li> <label for="id-date-picker-1">Show Until Date (yyyy-mm-dd)</label></li>
                    <li><label for="show_until">Set this to 1 day before next term's start date</label></li>
                    <li><label for="show_until">Make sure you add next school year before the current school year ends</label></li>
                    </ul>
                   
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="show_until" required="" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
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