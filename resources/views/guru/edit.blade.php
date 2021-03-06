@extends('layouts.dashboard')
@section('title', 'Edit Guru')
@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endsection
@section('heading-title', 'Edit Guru')
@section('heading-subtitle', '')
@section('li-one', 'Guru')
@section('li-two', 'Edit Guru')
@section('content')
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Guru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($data, ['route' => ['guru.update', $data->id], 'method' => 'PUT']) !!}
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                  {{ Form::label('nama', 'Nama') }}
                  {{ Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama Guru']) }}
                  @if($errors->has('nama'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('mapel') ? ' has-error' : '' }}">
                  {{ Form::label('mapel', 'Mata Pelajaran') }}
                  {{ Form::text('mapel', null, ['class' => 'form-control', 'placeholder' => 'Mata Pelajaran']) }}
                  @if($errors->has('mapel'))
                    <span class="help-block">
                      <strong>{{ $errors->first('mapel') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  {{ Form::label('email', 'Email') }}
                  {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                  @if($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}
                <a href="{{ route('guru.index') }}" class="btn btn-danger pull-right">Batal</a>
              </div>
            {!! Form::close() !!}
            
@endsection
@section('javascript')
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- page script -->
</script>
@endsection

