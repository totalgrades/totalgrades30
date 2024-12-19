@extends('admin.layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Staffers & Teachers Login</strong></div>
                <div class="panel-body">

                <div class="row">
                
                <div class="col-md-3 col-xs-12" >
                    <div class="logo text-center">
                    <a href="{{url('/')}}" class="simple-text">
                        @if(@$school->logo == null)
                        <img src="{{asset('/assets/img/logo/logo.jpg')}}" style="width: 130px; height: 130px; border-radius: 50%; margin-left: 1%; ">
                        @else
                            <img src="{{asset('/assets/img/logo/'.$school->logo)}}" style="width: 130px; height: 130px; border-radius: 50%; margin-left: 1%; ">
                        @endif
                    </a>
                    <div class="text-center" style="color: #FF5733;"> <strong>Online Gradebook @if(@$school->name == null)<br> for Primary & Secondary Schools</strong>@else {{ $school->name }} @endif</div>
                   </div>
                    
                </div>
                <div class="col-md-9 col-xs-12" style="border-left: 1px solid #ccc;">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin_login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link btn-warning" href="{{ url('/admin_password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            </div>
            <footer style="font-size: 11px;">
                <!-- Container -->
                <div class="text-center">
                    <!-- Footer Content -->
                        <!-- Paragraph -->
                        <p style="margin: 0;"><strong> Copyright &copy; <a href="https://totalgrades.com">Totalgrades</a> 2017 - 2018 (v2.0)</strong></p>
        
                        <p style="margin: 0;"><strong>Email: <a style="color: #FF5733" href="mailto:totalgrades@gmail.com">totalgrades@gmail.com</a></strong>
                        <p style="margin: 0;"><strong>Phone: <span style="color: #FF5733">+14034022387</span></strong></p>                      
                        <!-- Clearfix -->
                        <div class="clearfix"></div>
                </div>
            </footer>
        </div>

    </div>
    
</div>
@endsection