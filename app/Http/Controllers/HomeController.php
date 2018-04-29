<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Siswa;
use App\Guru;
use App\Absen;
use App\Kelas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mencari Jumlah Siswa (Jumlah)
        $jumlahSiswa = Siswa::all()->count();
        $jumlahKelas = Kelas::all()->count();
        //Mencari Siswa Sakit, Alpa, Izin (Jumlah)
        $absen = Absen::where(function($query){
            $query->where('keterangan', '=', 'Sakit');
            $query->orWhere('keterangan', '=', 'Izin');
            $query->orWhere('keterangan', '=', 'Alpa');
        })  ->whereRaw('Date(created_at) = CURDATE()')
            ->count();

            
            $data = [
            'sakit' => Absen::whereRaw('DATE(created_at) = CURDATE()')
                                        ->where('keterangan', '=', 'Sakit')
                                        ->count(),
            'alpa' => Absen::whereRaw('DATE(created_at) = CURDATE()')
                                        ->where('keterangan', '=', 'Alpa')
                                        ->count(),
            'izin' => Absen::whereRaw('DATE(created_at) = CURDATE()')
                                        ->where('keterangan', '=', 'Izin')
                                        ->count(),
            'masuk' => $jumlahSiswa - $absen,
            'kelas' => $jumlahKelas
            ];
        

        return view('home')->with($data);
    }
}
