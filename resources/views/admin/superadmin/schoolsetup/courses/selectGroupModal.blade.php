<!-- The Modal -->
<div class="modal fade" id="selectGroupModal-{{$schoolyear->id}}-{{$term->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #7FB3D5; color: #FFF">
              <h4 class="modal-title"><strong>School year: {{$schoolyear->school_year}}</strong></h4>
               <h4 class="modal-title"><strong>Term: {{$term->term}}</strong></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="widget-body">
                    <div class="widget-main">
                        <h5 class="modal-title">{{strtoupper('Select a Group')}}</h5>
                        <hr>
                        
                        <div class="list-group">
                        @foreach ($groups as $key=>$group)
                            @if($group->name != 'Admin')
                                <a href="{{asset('/schoolsetup/showcourses/'.$schoolyear->id) }}/{{$term->id}}/{{$group->id}}" class="list-group-item list-group-item-action">
                                    <span class="label label-xlg label-pink arrowed arrowed-right"> 
                                    {{$group->name}}
                                    </span>
                                    <span class="badge badge-pink badge-pill">
                                        courses: {{$group->courses()->where('term_id', '=', $term->id)->count()}}
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