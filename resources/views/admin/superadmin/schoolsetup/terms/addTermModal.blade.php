<!-- The Modal -->
<div class="modal fade" id="addTermModal-{{$schoolyear->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #7FB3D5; color: #FFF">
              <h4 class="modal-title"><strong>Add Term Form</strong></h4>
              <hr>
              <h5 class="modal-title">
                <ul class="list-unstyled spaced2">
                    <li>
                        <ul class="list-inline">
                            <li>
                                <i class="fa fa-circle"></i> School year: {{$schoolyear->school_year}}
                            </li>
                            <li>
                                <i class="fa fa-circle"></i> Start date: {{$schoolyear->start_date->toformatteddateString()}}
                            </li>
                            <li>
                                <i class="fa fa-circle"></i> End Date: {{$schoolyear->end_date->toFormatteddateString()}}
                            </li>
                            <li>
                                <i class="fa fa-circle"></i> Show Until: {{$schoolyear->show_until->toFormatteddateString()}}
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="list-unstyled spaced2">
                    <li>
                        <ul class="list-inline">
                            @foreach ($schoolyear_terms as $term)
                            <li>
                                <i class="fa fa-circle"></i> {{$term->term}}:
                                <ul>
                                    <li>
                                        Start: {{ $term->start_date->toFormattedDateString() }}
                                    </li>
                                    <li>
                                        End: {{ $term->end_date->toFormattedDateString() }}
                                    </li>
                                    <li>
                                        Next Term minus 1 day: {{ $term->show_until->toFormattedDateString() }}
                                    </li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>       
            </h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>            
            <!-- Modal body -->
            <div class="modal-body">

                <div class="widget-body">
                    <div class="widget-main">

                      <form class="form-group" action="{{ url('/schoolsetup/postterm', [$schoolyear->id]) }}" method="POST">

                        {{ csrf_field() }}

                        <input class="form-control" id="school_year_id" type="hidden" name="school_year_id" value="{{$schoolyear->id}}" required="" />

                        <label for="school-year">Term </label>

                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    
                                    <input class="form-control" id="term" type="text" name="term" placeholder="eg. 1st Term"  required="" />
                                    
                                </div>
                            </div>
                        </div>

                        <hr />

                        <label for="id-date-picker-1">Start Date (yyyy-mm-dd)</label>

                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control date-picker" id="start_date" type="text" data-date-format="yyyy-mm-dd" name="start_date" required="" />
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
                                    <input class="form-control date-picker" id="end_date" type="text" data-date-format="yyyy-mm-dd" name="end_date" required="" />
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
                            <li><label for="show_until" style="color: red">Remember to create next school year before the current school year ends</label>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control date-picker" id="show_until" type="text" data-date-format="yyyy-mm-dd" name="show_until" required="" />
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