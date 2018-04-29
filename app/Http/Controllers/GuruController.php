<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Guru;
use Session;

class GuruController extends Controller
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
        $guru = Guru::all();
        return view('guru.index')->with('data', $guru);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
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
                'mapel' => 'required',
                'email' => 'required'
            ]);

        $guru = new Guru;
        $guru->nama     = $request->nama;
        $guru->mapel    = $request->mapel;
        $guru->email    = $request->email;
        $guru->save();

        Session::flash('success', 'Data Guru Berhasil Disimpan');
        return redirect()->route('guru.index');
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
        $guru = Guru::find($id);
        return view('guru.edit')->with('data', $guru);
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
                'nama' => 'required|max:50',
                'mapel' => 'required',
                'email' => 'required' 
            ]);

        $guru = Guru::find($id);
        $guru->nama     = $request->nama;
        $guru->mapel    = $request->mapel;
        $guru->email    = $request->email;
        $guru->save();

        Session::flash('success', 'Data Guru Berhasil Dirubah');
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();

        Session::flash('delete', 'Data Guru Berhasil Dihapus');
        return redirect()->route('guru.index');
    }
}
