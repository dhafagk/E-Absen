@extends('layouts.dashboard')
@section('title', 'Rekap Absen')
@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endsection
@section('heading-title', 'Absen Siswa')
@section('heading-subtitle', '')
@section('li-one', 'Menu Utama')
@section('li-two', 'Absen Siswa')
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
          @elseif(Session::has('warning'))
            <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="alert alert-warning">
                  <strong>Info : </strong>{{ Session::get('warning') }}
                </div>
              </div>
            </div>
          @endif
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rekap Absen</h3>
              <a href="{{ route('absen.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $index => $value)
                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $value->siswa->nama }}</td>
                  <td>{{$value->siswa->kelas->nama_kelas}}</td>
                  <td>{{ $value->keterangan }}</td>
                  @if(Auth::user()->level == 0)
                  <td>  
                    {!! Form::open(['route' => ['absen.destroy', $value->id], 'method' => 'DELETE']) !!}
                      {{ Form::submit('Hapus', ['class' => 'btn btn-danger']) }}
                    {!! Form::close() !!}
                  </td>
                  @else
                    <td>NOT ACCES GIVEN</td>
                    @endif
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

