<!-- The Modal -->
<div class="modal fade" id="editTermModal-{{$term->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #7FB3D5; color: #FFF">
              <h4 class="modal-title"><strong>Editing {{ $term->term }}</strong></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <hr>
              <h5 class="modal-title">School year: {{$schoolyear->school_year}} </h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">

                <div class="widget-body">
                    <div class="widget-main">

                        <form class="form-group" action="{{ url('/schoolsetup/posttermupdate', [$term->id])}}" method="POST">

                            {{ csrf_field() }}

                            <label for="school-year">Term</label>

                                <div class="row">
                                    <div class="col-xs-8 col-sm-11">
                                        <div class="input-group">
                                            
                                            <input class="form-control" id="term" type="text" name="term" value="{{ $term->term }}" disabled="disabled" />
                                            
                                        </div>
                                    </div>
                                </div>

                                <hr />

                                <label for="id-date-picker-1">Start Date (yyyy-mm-dd)</label>

                                <div class="row">
                                    <div class="col-xs-8 col-sm-11">
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="start_date" type="text" data-date-format="yyyy-mm-dd" name="start_date" value="{{ $term->start_date->format('Y-m-d')}}"/>
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
                                            <input class="form-control date-picker" id="end_date" type="text" data-date-format="yyyy-mm-dd" name="end_date" value="{{ $term->end_date->format('Y-m-d')}}" />
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <hr />

                                <ul>
                                <li><label for="show_until">Show Until (yyyy-mm-dd)</label></li>
                                <li><label for="show_until">Set this to 1 day before next term's start date</label></li>
                                <li><label for="show_until">Make sure you add next school year before the current school year ends</label></li>
                                </ul>
                                <div class="row">
                                    <div class="col-xs-8 col-sm-11">
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="show_until" type="text" data-date-format="yyyy-mm-dd" name="show_until" value="{{ $term->show_until->format('Y-m-d')}}" />
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
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