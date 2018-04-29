@extends('layouts.credentials')
@section('title', 'Register')
@section('content')
    <p class="login-box-msg">Form Register</p>
    {!! Form::open(['url' => '/register', 'method' => 'POST']) !!}
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Nama']) }}
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        {{ Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) }}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         @if($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Konfirmasi Password']) }}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         @if($errors->has('password_confirmation'))
          <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          {{ Form::submit('Register', ['class' => 'btn btn-primary btn-block btn-flat']) }}
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}

    <a href="{{ url('/login') }}" class="text-center">Sudah Punya Akun ?</a>
@endsection
@section('javascript')
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endsection
  



