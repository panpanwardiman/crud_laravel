<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatKul;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkul = MatKul::paginate(10);

        return view('matakuliah.lists', ['lists' => $matkul]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliah.create');
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
            'kode' => 'required|unique:mat_kuls',
            'matakuliah' => 'required'
        ])->validate();

        MatKul::create($data);

        return redirect()->route('matakuliah.index')->with('success', 'Successfully saved.');
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
        $matkul = MatKul::findOrFail($id);

        return view('matakuliah.edit', ['matkul' => $matkul]);
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
        $matkul = MatKul::findOrFail($id);

        $data = $request->all();
        \Validator::make($data, [
            'kode' => 'required|unique:mat_kuls,id,'. $id,
            'matakuliah' => 'required'
        ])->validate();

        $matkul->update($data);

        return redirect()->route('matakuliah.index')->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matkul = MatKul::findOrFail($id);

        $matkul->delete();

        return redirect()->back();
    }
}
