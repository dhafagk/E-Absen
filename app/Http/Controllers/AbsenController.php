<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Absen;
use App\Siswa;
use App\Kelas;
use Session;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
                
        $absen = Absen::with('siswa')
        ->whereRaw('DATE(created_at) = CURDATE()')
        ->get();
        return view('absen.index')->with('data', $absen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::with('kelas')
        ->get();
        //$siswa = Siswa::lists('nama', 'id');
        return view('absen.create')->with('data', $siswa);
        // $siswa = Siswa::lists('nama', 'id');
        // return view('absen.create')->with('data', $siswa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
                'siswa_id' => 'required',
                'keterangan' => 'required',
            ]);

        $alpaCount = Absen::where('siswa_id', '=', $request->siswa_id)
                            ->where('keterangan', '=', 'Alpa')
                            ->count();

        if (Absen::where('siswa_id', '=', $request->siswa_id)
            ->whereRaw('DATE(created_at) = CURDATE()')
            ->exists()) {
            return redirect()->back()->with('message', 'Data Telah Tersedia');
        } elseif($alpaCount >= 3 && $request->keterangan == 'Alpa') {
            $absen = new Absen;
            $absen->siswa_id = $request->siswa_id;
            $absen->keterangan = $request->keterangan;
            $absen->save();

            $nama = Siswa::where('id', '=', $request->siswa_id)->get();

            foreach($nama as $namas) {
                Session::flash('warning', $namas->nama.' Sudah Lebih Dari 3 Kali Alpa');
                return redirect()->route('absen.index');    
            }                              
        } else {
            $absen = new Absen;
            $absen->siswa_id = $request->siswa_id;
            $absen->keterangan = $request->keterangan;
            $absen->save();

            Session::flash('success', 'Absen Berhasil Ditambah');
            return redirect()->route('absen.index');    
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Absen::with('siswa')->find($id);
        return view('absen.edit')->with('data', $siswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
                'keterangan' => 'required'
            ]);
        $absen = Absen::find($id);
        $absen->keterangan = $request->keterangan;
        $absen->save();

        Session::flash('success', 'Absen Berhasil Dirubah');
        return redirect()->route('absen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absen = Absen::find($id);
        $absen->delete();

        Session::flash('delete', 'Absen Berhasil Dihapus');
        return redirect()->route('absen.index');
    }
}
