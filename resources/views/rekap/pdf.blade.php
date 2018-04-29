<!DOCTYPE html>
<html>
<head>
	<title>Rekap Per Tanggal {{ Route::current()->getParameter('tanggal') }}</title>
	<style>
		table {
			border: 1px solid black;
			border-collapse: collapse;
			width: 100%;
			text-align: center;
		}
		tr, td, th {
			border: 1px solid black;
		}
		.left {
			float: left;
		}
		.right {
			float: right;
		}
		ul {
			list-style: none;
			margin: 20px;
		}
		ul li {
			display: inline-block;
			margin: 10px;
		}
		ul li a {
			text-decoration: none;
			color: black;
			background-color: #EEE;
			padding: 10px;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<section>
		<div>
			<div class="right">
				<ul>
					<li><a href="{{ url('rekap') }}">Kembali</a></li>
					<li><a href="{{ route('rekap.download', Route::current()->getParameter('tanggal')) }}">Download</a></li>
				</ul>
			</div>
			<div class="left">
				<h3>Rekap Absen Tanggal :</h3>
				<h4>{{ Route::current()->getParameter('tanggal') }}</h4>
				<h4></h4>
			</div>	
		</div>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>keterangan</th>	
				</tr>
			</thead>
			<tbody>
				@foreach($data as $index => $value)
					<tr style="page-break-after: always;">
						<td>{{ $index+1 }}</td>
						<td>{{ $value->siswa->nama }}</td>
						<td>{{$value->siswa->kelas->nama_kelas}}</td>
						<td>{{ $value->keterangan }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div align="right">
			<h4>Pencetak</h4>
			<p>{{ Auth::user()->name }}</p>
		</div>
		<p align="center">&copy; 2018 SMKN 13 Bandung</p>
	</section>
</body>
</html>