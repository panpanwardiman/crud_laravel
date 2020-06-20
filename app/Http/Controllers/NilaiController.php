<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\Mahasiswa;
use App\MatKul;
use DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = DB::table('nilais')
                    ->join('mahasiswas', 'nilais.mahasiswa_id', '=', 'mahasiswas.id')
                    ->join('mat_kuls', 'nilais.matakuliah_id', '=', 'mat_kuls.id')
                    ->select('mahasiswas.nim AS nim', 'mahasiswas.nama AS nama', 'mat_kuls.kode AS kode', 'mat_kuls.matakuliah AS matakuliah', 'nilais.*')
                    ->paginate(10);

        return view('nilai.lists', ['lists' => $nilai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        \Validator::make($data, [
            'nim' => 'required',
            'kode' => 'required',
            'nilai_harian' => 'required|between:0,99.99',
            'uts' => 'required|between:0,99.99',
            'uas' => 'required|between:0,99.99',  
        ])->validate();

        Nilai::create($data);

        return redirect()->route('nilai.index')->with('success', 'Successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai = DB::table('nilais')
                    ->join('mahasiswas', 'nilais.mahasiswa_id', '=', 'mahasiswas.id')
                    ->join('mat_kuls', 'nilais.matakuliah_id', '=', 'mat_kuls.id')
                    ->select('mahasiswas.nim AS nim', 'mahasiswas.nama AS nama', 'mat_kuls.kode AS kode', 'mat_kuls.matakuliah AS matakuliah', 'nilais.*')
                    ->where('nilais.id', $id)
                    ->first();

        return view('nilai.show', ['nilai' => $nilai]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = DB::table('nilais')
                    ->join('mahasiswas', 'nilais.mahasiswa_id', '=', 'mahasiswas.id')
                    ->join('mat_kuls', 'nilais.matakuliah_id', '=', 'mat_kuls.id')
                    ->select('mahasiswas.nim AS nim', 'mahasiswas.nama AS nama', 'mat_kuls.kode AS kode', 'mat_kuls.matakuliah AS matakuliah', 'nilais.*')
                    ->where('nilais.id', $id)
                    ->first();

        // dd($nilai);

        return view('nilai.edit', ['nilai' => $nilai]);
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
        $nilai = Nilai::findOrFail($id);
        $data = $request->all();

        \Validator::make($data, [
            'nim' => 'required',
            'kode' => 'required',
            'nilai_harian' => 'required|between:0,99.99',
            'uts' => 'required|between:0,99.99',
            'uas' => 'required|between:0,99.99',  
        ])->validate();

        $nilai->update($data);  

        return redirect()->route('nilai.index')->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = nilai::findOrFail($id);

        $nilai->delete();

        return redirect()->back();
    }

    public function getNameByNim($nim)
    {
        $mahasiswa = Mahasiswa::where('nim',$nim)->first();

        return response()->json([
            'data' => $mahasiswa
        ], 200);
    }

    public function getMatkulByKode($kode)
    {
        $matkul = MatKul::where('kode', $kode)->first();

        return response()->json([
            'data' => $matkul
        ], 200);
    }
}
