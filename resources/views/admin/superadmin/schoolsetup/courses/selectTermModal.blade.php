<!-- The Modal -->
<div class="modal fade" id="selectTermModal-{{$schoolyear->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #7FB3D5; color: #FFF">
              <h4 class="modal-title"><strong>School year: {{$schoolyear->school_year}}</strong></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="widget-body">
                    <div class="widget-main">
                        <h5 class="modal-title">{{strtoupper('Select Current Term')}}</h5>
                        <hr>
                        
                        <div class="list-group">
                        @foreach($terms->where('school_year_id', $schoolyear->id) as $term)
                            @if ($today->between($term->start_date, $term->show_until )) 
                                <a href="{{asset('/schoolsetup/showcoursesgroups/'.$schoolyear->id) }}/{{$term->id}}" class="list-group-item list-group-item-action">
                                    <span class="label label-xlg label-success arrowed-right"> 
                                    {{$term->term}}
                                    </span>
                                    <span class="badge badge-success badge-pill">
                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                        Current
                                    </span>
                                </a>
                            @else
                                <a href="" class="list-group-item list-group-item-action disabled" aria-disabled="true">
                                    <span class="label label-xlg label-danger arrowed-right"> 
                                    {{$term->term}}
                                    </span>
                                </a>
                            @endif
                        @endforeach
                        </div>
            
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