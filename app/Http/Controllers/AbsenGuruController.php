<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AbsenGuru;
use App\Guru;
use Session;


class AbsenGuruController extends Controller
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
        $absen = AbsenGuru::with('guru')
                ->whereRaw('DATE(created_at) = CURDATE()')
                ->get();
        return view('absen_guru.index')->with('data', $absen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::lists('nama', 'id');
        return view('absen_guru.create')->with('data', $guru);

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
            'guru_id' => 'required',
            'keterangan' => 'required'
            ]);

        if (AbsenGuru::where('guru_id', '=', $request->guru_id)
            ->whereRaw('DATE(created_at) = CURDATE()')
            ->exists()) {
            return redirect()->back()->with('message', 'Data Telah Tersedia');
        }

        $absen = new AbsenGuru;
        $absen->guru_id = $request->guru_id;
        $absen->keterangan = $request->keterangan;
        $absen->save();

        Session::flash('success', 'Data Berhasil Ditambah');
        return redirect()->route('absenguru.index');
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
        $absen = AbsenGuru::with('guru')->find($id);
        return view('absen_guru.edit')->with('data', $absen);
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
        $absen = AbsenGuru::find($id);
        $absen->keterangan = $request->keterangan;
        $absen->save();

        Session::flash('success', 'Data Berhasil Dirubah');
        return redirect()->route('absenguru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absen = AbsenGuru::find($id);
        $absen->delete();

        Session::flash('delete', 'Data Berhasil Dihapus');
        return redirect()->route('absenguru.index');
    }
}
