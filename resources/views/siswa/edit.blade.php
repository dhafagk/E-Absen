@extends('layouts.dashboard')
@section('title', 'Edit Siswa')
@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endsection
@section('heading-title', 'Edit Siswa')
@section('heading-subtitle', '')
@section('li-one', 'Siswa')
@section('li-two', 'Edit Siswa')
@section('content')
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Siswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($data, ['route' => ['siswa.update', $data->id], 'method' => 'PUT']) !!}
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                  {{ Form::label('nama', 'Nama') }}
                  {{ Form::text('nama', $data->nama, ['class' => 'form-control', 'placeholder' => 'Nama Siswa']) }}
                  @if($errors->has('nama'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('kelas_id') ? ' has-error' : '' }}">
                  {{ Form::label('kelas_id', 'Nama Kelas') }}
                  <select class="form-control" name="kelas_id" id="kelas_id">
                    <option value>-- Nama Kelas --</option>
                    @foreach($keles as $u)
                    <option value="{{$u->id}}"@if(($u->id) == ($data->kelas_id)) selected @endif>{{$u->nama_kelas}}</option>
                    @endforeach
                  </select>
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
                <a href="{{ route('siswa.index') }}" class="btn btn-danger pull-right">Batal</a>
              </div>
            {!! Form::close() !!}
            
@endsection
@section('javascript')
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- page script -->
</script>
@endsection

