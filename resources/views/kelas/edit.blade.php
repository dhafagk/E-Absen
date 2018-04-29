@extends('layouts.dashboard')
@section('title', 'Edit Kelas')
@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endsection
@section('heading-title', 'Edit Kelas')
@section('heading-subtitle', '')
@section('li-one', 'Kelas')
@section('li-two', 'Edit Kelas')
@section('content')
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Kelas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($data, ['route' => ['kelas.update', $data->id], 'method' => 'PUT']) !!}
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
                <a href="{{ route('kelas.index') }}" class="btn btn-danger pull-right">Batal</a>
              </div>
            {!! Form::close() !!}
            
@endsection
@section('javascript')
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- page script -->
</script>
@endsection

