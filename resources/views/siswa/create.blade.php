@extends('layouts.dashboard')
@section('title', 'Tambah Siswa')
@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endsection
@section('heading-title', 'Tambah Siswa')
@section('heading-subtitle', '')
@section('li-one', 'Siswa')
@section('li-two', 'Tambah Siswa')
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
              <h3 class="box-title">Form Tambah Siswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'siswa.store', 'method' => 'POST']) !!}
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                  {{ Form::label('nama', 'Nama') }}
                  {{ Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama Siswa']) }}
                  @if($errors->has('nama'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('kelas_id') ? ' has-error' : '' }}">
                  {{ Form::label('kelas_id', 'Nama Kelas') }}
                  {{ Form::select('kelas_id', $data, null, ['class' => 'form-control', 'placeholder' => '-- Pilih Siswa --'] )}}
                  @if($errors->has('kelas_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('kelas_id') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('ttl') ? ' has-error' : '' }}">
                  {{ Form::label('ttl', 'Tanggal Lahir') }}
                  {{ Form::date('ttl', null, ['class' => 'form-control']) }}
                  @if($errors->has('ttl'))
                    <span class="help-block">
                      <strong>{{ $errors->first('ttl') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}
                <a href="{{ route('siswa.index') }}" class="btn btn-default pull-right">Kembali</a>
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

