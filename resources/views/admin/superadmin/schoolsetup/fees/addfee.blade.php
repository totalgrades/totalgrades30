@extends('admin.superadmin.dashboard')

@section('content')


                        <div class="page-header">
                            <h1>
                                Add Fee
                                <hr>
                                @include('flash::message')
                                
                            </h1>
                        </div><!-- /.page-header -->

                        	<form class="form-group" action="{{ url('/schoolsetup/fees/postfee') }}" method="POST">
                            
									{{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="widget-box">
                                                <div class="widget-header">
                                                    <h4 class="widget-title">Add fee for {{$current_school_year->school_year}} School Year </h4>
                                                    <span class="widget-toolbar">
                                                        <a href="{{asset('/schoolsetup/fees/showfees')}}">
                                                            <i class="ace-icon fa fa-cog"></i>
                                                            Edit Fee
                                                        </a>

                                                    </span>
                                                    
                                                    
                                                </div>

                                                <div class="widget-body">
                                                    <div class="widget-main">


                                                 
                                                    <label for="feetype"><strong>Select Fee Type</strong></label>
                                                    <div class="row">
                                                            <div class="col-xs-8 col-sm-11">
                                                                <div class="input-group">

                                                        <select name="feetype_id" id="feetype_id">
                                                            @foreach($feetypes as $key=>$feetype)

                                                                <option value="{{ $feetype->id }}">
                                                                    {{ $feetype->fee_type }}
                                                                </option>

                                                            @endforeach
                                                        </select>
                                                        </div>
                                                        </div>
                                                        </div>
                                                   
                                                    <hr />


                                                    <label for="group"><strong>Select Group</strong></label>
                                                    <div class="row">
                                                            <div class="col-xs-8 col-sm-11">
                                                                <div class="input-group">
                                                                    
                                                                     <select name="group_id" id="group_id">
                                                                        @foreach($groups->where('id', '!=', 1) as $key=>$group)

                                                                            <option value="{{ $group->id }}">
                                                                                {{ $group->name }}
                                                                            </option>

                                                                        @endforeach
                                                                     </select>
                                                                                                                        
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr />

                                                 <label for="term"><strong>Select Term(Current School Year Only)</strong></label>
                                                    <div class="row">
                                                            <div class="col-xs-8 col-sm-11">
                                                                <div class="input-group">
                                                                    
                                                                     <select name="term_id" id="term_id">
                                                                        @foreach($terms->where('school_year_id', $current_school_year->id) as $key=>$term)

                                                                            <option value="{{ $term->id }}">
                                                                                {{ $term->term }}
                                                                            </option>

                                                                        @endforeach
                                                                    </select>
                                                                                                                        
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr />

                                                    <label for="school-year">Amount</label>

                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-11">
                                                                <div class="input-group">
                                                                    
                                                                    <input class="form-control" id="amount" type="text" name="amount" placeholder="eg. 200000"  required="" />
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr />


                                                    <label for="school-year">Due Date</label>

                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-11">
                                                                <div class="input-group">
                                                                    <input class="form-control date-picker" id="due_date" name="due_date" type="text" data-date-format="yyyy-mm-dd" />
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
                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>



                                <div class="hr hr-18 dotted hr-double"></div>
                                <br>

				        <div class="alert-danger">
					
						<ul>
							@foreach($errors->all() as $error)

								<li> {{ $error }}</li>

							@endforeach

						</ul>

				</div>


@endsection
