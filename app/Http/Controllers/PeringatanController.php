<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Absen;

class PeringatanController extends Controller
{
    public function index()
    {

    	$peringatan = Absen::select('siswa_id', \DB::raw
            ("SUM(CASE WHEN keterangan = 'Alpa' THEN 1 ELSE 0 END) Alpa,
            SUM(CASE WHEN keterangan = 'Izin' THEN 1 ELSE 0 END) Izin"))
            ->groupBy('siswa_id')
            ->get();

           
        return view('peringatan.index')->with('data', $peringatan);
    	
    }

}
