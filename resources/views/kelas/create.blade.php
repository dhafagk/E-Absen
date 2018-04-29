@extends('layouts.dashboard')
@section('title', 'Tambah Kelas')
@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endsection
@section('heading-title', 'Tambah Kelas')
@section('heading-subtitle', '')
@section('li-one', 'Kelas')
@section('li-two', 'Tambah Kelas')
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
              <h3 class="box-title">Form Tambah Kelas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'kelas.store', 'method' => 'POST']) !!}
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group{{ $errors->has('nama_kelas') ? ' has-error' : '' }}">
                  {{ Form::label('nama_kelas', 'Nama Kelas') }}
                  {{ Form::text('nama_kelas', null, ['class' => 'form-control', 'placeholder' => 'Nama Kelas']) }}
                  @if($errors->has('nama_kelas'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nama_kelas') }}</strong>
                    </span>
                  @endif
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}
                <a href="{{ route('kelas.index') }}" class="btn btn-default pull-right">Kembali</a>
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

