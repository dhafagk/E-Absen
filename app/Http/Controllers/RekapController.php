<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Absen;
use PDF;

class RekapController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$absen = $absen = Absen::groupBy(\DB::raw('DATE(created_at)'))
            ->orderBy('created_at', 'DESC')
            ->get();
    	return view('rekap.index')->with('data', $absen);
    }

    public function show($tanggal)
    {
        $absen = Absen::with('siswa')->where(\DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"), '=', $tanggal)
                    ->get();
        return view('rekap.show')->with('data', $absen);
    }

    public function getPdf($tanggal)
    {    
        $absen = Absen::with('siswa')->where(\DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"), '=', $tanggal)
                    ->get();
        return view('rekap.pdf')->with('data', $absen)->with($tanggal);   
    }

    public function download($tanggal)
    {
        $data = Absen::with('siswa')->where(\DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"), '=', $tanggal)
                    ->get();

        $pdf = PDF::loadView('rekap.download', ['data' => $data]);
        return $pdf->download('rekap-absen.pdf');
    }
}
