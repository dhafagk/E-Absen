@extends('layouts.credentials')
@section('title', 'Login')
@section('content')
    <p class="login-box-msg">Form Login</p>
    {!! Form::open(['url' => '/login', 'method' => 'POST']) !!}
      {{ csrf_field() }}
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
          {{ Form::submit('Masuk', ['class' => 'btn btn-primary btn-block btn-flat']) }}
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}

    <a href="#">Lupa Password</a><br>
    <a href="{{ url('/register') }}" class="text-center">Belum Punya Akun ?</a>
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
  



