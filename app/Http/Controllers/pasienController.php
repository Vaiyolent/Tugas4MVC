<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pasien;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if(strlen($search)){
            $payload = pasien::where('nama','like','%search%')
            ->orwhere('usia','%search%')
            ->orwhere('tinggiBadan','%search%')
            ->orwhere('beratBadan','%search%');
        } else {
            $payload = pasien::orderBy('id')->paginate();
        }
        return view('pasien.index')->with('payload',$payload);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'usia' => 'required|numeric',
            'tinggiBadan' => 'required|numeric',
            'beratBadan' => 'required|numeric',
        ]);

        $payload = [
            'nama' => $request->nama,
            'usia' => $request->usia,
            'tinggiBadan' => $request->tinggiBadan,
            'beratBadan' => $request->beratBadan,
        ];
        pasien::create($payload);
        return redirect() -> to('pasien');
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
        $payload = pasien::where('id',$id)->first();
        return view('pasien.edit')->with('payload',$payload);
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
        $request->validate([
            'nama' => 'required',
            'usia' => 'required|numeric',
            'tinggiBadan' => 'required|numeric',
            'beratBadan' => 'required|numeric',
        ]);

        $payload = [
            'nama' => $request->nama,
            'usia' => $request->usia,
            'tinggiBadan' => $request->tinggiBadan,
            'beratBadan' => $request->beratBadan,
        ];
        pasien::where('id',$id)->update($payload);
        return redirect() -> to('pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pasien::where('id',$id)->delete();
        return redirect() -> to('pasien');
    }
}
