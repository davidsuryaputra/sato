@extends('layouts.auth')

@section('title', 'Log In')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <b>Sato</b>PANEL
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ url('/') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group {{ $errors->has('email') ? ' has-error' : 'has-feedback' }}">
        <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @if ($errors  ->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif


      </div>
      <div class="form-group {{ $errors->has('email') ? ' has-error' : 'has-feedback' }}">
        <!-- <label for="password" class="col-md-4 control-label">Password</label> -->
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    {{-- <a href="#">I forgot my password</a><br> --}}
    {{-- <a href="{{ url('register') }}" class="text-center">Register a new membership</a> --}}

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
