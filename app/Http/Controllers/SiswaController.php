<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Siswa;
use App\Kelas;
use Auth;
use Session;

class SiswaController extends Controller
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
        $siswa = Siswa::all();
        return view('siswa.index')->with('data', $siswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::lists('nama_kelas', 'id');
        return view('siswa.create')->with('data', $kelas);
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
            'nama' => 'required|max:50',
            'kelas_id' => 'required',
            'ttl' => 'required'
            ]);

        $conv = date('d-m-Y', strtotime($request->ttl));
        if(Siswa::where('nama', '=', $request->nama)
            ->where('ttl', '=', $conv)
            ->exists()) {
            return redirect()->back()->with('message', 'Data Telah Tersedia');
        } 

        

        $siswa          = new Siswa;
        $siswa->nama    = $request->nama;
        $siswa->kelas_id  = $request->kelas_id;
        $siswa->ttl     = $conv;
        $siswa->save();

        Session::flash('success', 'Data Siswa Berhasil Disimpan');
        return redirect()->route('siswa.index');


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
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        return view('siswa.edit')->with('data', $siswa)->with('keles', $kelas);
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
        
        if (empty($request->ttl)) {
            $this->validate($request, [
                'nama' => 'required|max:50',
                'kelas_id' => 'required',
            ]);



        $siswa          = Siswa::find($id);
        $siswa->nama    = $request->nama;
        $siswa->kelas_id  = $request->kelas_id;
        $siswa->ttl     = $siswa->ttl;
        $siswa->save();
        } else {
            $this->validate($request, [
                'nama' => 'required|max:50',
                'kelas_id' => 'required',
            ]);


        $conv = date('d-m-Y', strtotime($request->ttl));
        $siswa          = Siswa::find($id);
        $siswa->nama    = $request->nama;
        $siswa->kelas_id  = $request->kelas_id;
        $siswa->ttl     = $conv;
        $siswa->save();
        }

        

        Session::flash('success', 'Data Siswa Berhasil Dirubah');
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        Session::flash('delete', 'Data Siswa Berhasil Dihapus');
        return redirect()->route('siswa.index');
    }
}
