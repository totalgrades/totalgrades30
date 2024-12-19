<!-- The Modal -->
<div class="modal fade" id="addGroupModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #7FB3D5; color: #FFF">
              <h4 class="modal-title"><strong>Add Group Form</strong></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">

                <div class="widget-body">
                    <div class="widget-main">

                        <form class="form-group" action="{{ url('/schoolsetup/postgroup') }}" method="POST">
                            {{ csrf_field() }}

                            <label for="school-year">Group Name</label>

                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        
                                        <input class="form-control" id="group" type="text" name="name" placeholder="eg. Basic 1A"  required="" />
                                        
                                    </div>
                                </div>
                            </div>

                            <hr />

                            
                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" value="Submit" class="btn btn-success">Submit</button>
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