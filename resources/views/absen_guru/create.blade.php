@extends('layouts.dashboard')
@section('title', 'Tambah Data Absen')
@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endsection
@section('heading-title', 'Tambah Data Absen')
@section('heading-subtitle', '')
@section('li-one', 'Absen Guru')
@section('li-two', 'Tambah Data')
@section('content')
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
        @if(Session::has('message'))
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="alert alert-success">
                  <strong>Message : </strong>{{ Session::get('message') }}
                </div>
              </div>
            </div>
            @endif
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Absen Guru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'absenguru.store', 'method' => 'POST']) !!}
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group{{ $errors->has('guru_id') ? ' has-error' : '' }}">
                  {{ Form::label('guru_id', 'Nama') }}
                  {{ Form::select('guru_id', $data, null, ['class' => 'form-control', 'placeholder' => '-- Pilih Guru --'] )}}
                  @if($errors->has('guru_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('guru_id') }}</strong>
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
                <a href="{{ route('absenguru.index') }}" class="btn btn-default pull-right">Kembali</a>
              </div>
            {!! Form::close() !!}
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
@endsection
@section('javascript')
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- page script -->
</script>
@endsection

