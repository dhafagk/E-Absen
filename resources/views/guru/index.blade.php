@extends('layouts.dashboard')
@section('title', 'Guru')
@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endsection
@section('heading-title', 'Guru')
@section('heading-subtitle', '')
@section('li-one', 'Menu Utama')
@section('li-two', 'Guru')
@section('content')
      <div class="row">
        <div class="col-xs-12">
        @if(Session::has('success'))
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="alert alert-success">
                  <strong>Sukses : </strong>{{ Session::get('success') }}
                </div>
              </div>
            </div>
          @elseif(Session::has('delete'))
            <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="alert alert-danger">
                  <strong>Sukses : </strong>{{ Session::get('delete') }}
                </div>
              </div>
            </div>
          @endif
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Siswa</h3>
              <a href="{{ route('guru.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Guru</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Guru</th>
                  <th>Mata Pelajaran</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $index => $value)
                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $value->nama }}</td>
                  <td>{{ $value->mapel }}</td>
                  <td>{{ $value->email }}</td>
                  <td>
                    {!! Form::open(['route' => ['guru.destroy', $value->id], 'method' => 'DELETE']) !!}
                      {{ Form::submit('Hapus', ['class' => 'btn btn-danger']) }}
                      <a href="{{ route('guru.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection
@section('javascript')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
@endsection

