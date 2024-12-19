@extends('homepublic.layouts.app')

@section('content')			
			

			<!-- page-top start-->
			<!-- ================ -->
			<div class="page-top object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="text-center">
			                    
		                        @if(@$school->logo == null)
		                        <img src="{{asset('/assets/img/logo/logo.jpg')}}" style="width: 180px; height: 180px; border-radius: 50%; margin: 0 auto;">
		                        @else
		                            <img src="{{asset('/assets/img/logo/'.$school->logo)}}" style="width: 180px; height: 180px; border-radius: 50%; margin: 0 auto;">
		                        @endif
			                   
		                   </div>
							<h1 class="text-center title">
								@if(@$school->name == null)
									Totalgrades v2.0 Demo School
								@else
									{{ $school->name }}
								@endif
							</h1>
							<div class="separator"></div>
							<p class="text-center">Simple, Smart, and Affordable.</p>
							<div class="text-center">
								<a href="{{url('login')}}" class="btn radius btn-primary btn-lg">Students-Login(Demo) <i class="fa fa-user"></i></a>
								<a href="{{url('admin_login')}}" class="btn radius btn-danger btn-lg">Teachers-Login(Demo) <i class="fa fa-user-plus"></i></a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- page-top end -->


@endsection