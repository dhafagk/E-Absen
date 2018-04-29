@extends('layouts.dashboard')
@section('title', 'Edit Absen')
@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endsection
@section('heading-title', 'Edit Absen')
@section('heading-subtitle', '')
@section('li-one', 'Absen Guru')
@section('li-two', 'Edit Data')
@section('content')
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Absen</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($data, ['route' => ['absenguru.update', $data->id], 'method' => 'PUT']) !!}
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                  {{ Form::label('nama', 'Nama') }}
                  {{ Form::text('nama', $data->guru->nama, ['class' => 'form-control', 'readonly' => '']) }}
                  @if($errors->has('nama'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                  {{ Form::label('keterangan', 'Keterangan') }}
                  {{ Form::select('keterangan', [
                      'Sakit' => 'Sakit',
                      'Alpa' => 'Alpa',
                      'Izin' => 'Izin'
                  ], null, ['class' => 'form-control', 'placeholder' => '-- Keterangan --']) }}
                  @if($errors->has('keterangan'))
                    <span class="help-block">
                      <strong>{{ $errors->first('keterangan') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}
                <a href="{{ route('absenguru.index') }}" class="btn btn-danger pull-right">Batal</a>
              </div>
            {!! Form::close() !!}
            
@endsection'
@section('javascript')
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- page script -->
</script>
@endsection

