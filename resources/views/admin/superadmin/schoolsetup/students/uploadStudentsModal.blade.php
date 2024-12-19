<!-- The Modal -->
<div class="modal fade" id="uploadStudentsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #7FB3D5; color: #FFF">
              <h4 class="modal-title"><strong>Upload Students</strong></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <hr>
              <h5 class="modal-title">
                <div class="alert alert-info">
                    <strong>Download sample file to use as template to upload</strong> 
                    <strong style="color: #FF0000;"></strong> students.
                    <a href="{{ URL::to( '/sample-files/sample-students-upload.ods')  }}" target="_blank">
                        <i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i><strong style="color: #FF0000">Sample Student File</strong>
                    </a>
                  Please use <strong style="color: #FF0000;">open office</strong> for best result. Excel may throw some errors due to white spaces.
                </div>
              </h5>
            </div>            
            <!-- Modal body -->
            <div class="modal-body">
                <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('/schoolsetup/students/importstudents') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                     <input type="file" name="import_file" />
                     {{ csrf_field() }}
                     <br/>
                     <button class="btn btn-primary">Upload New Students</button>
                 </form>
            </div>                         
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
            
        </div>
    </div>
</div>