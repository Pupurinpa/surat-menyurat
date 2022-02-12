<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipe;

class tipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipes=tipe::paginate(5);
        return view('tipe.index',compact('tipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated=$request->validate([
            'tipe'=>'required|unique:tipes,tipe',
            'kode'=>'required|max:2|unique:tipes,kode',
        ]);
        $tipes=new tipe;
        $tipes->tipe=$request->tipe;
        $tipes->kode=$request->kode;
        $tipes->save();
        if(!$tipes){
            return back()->with('error','Data gagal disimpan !!');

        }else{
            return back()->with('success','Data berhasil disimpan');
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
        //
        $tipes=tipe::find($id);
        return view('tipe.edit',compact('tipes'));
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
        //
        $validated=$request->validate([
            'tipe'=>'required|unique:tipes,tipe',
            'kode'=>'required|max:2|unique:tipes,kode',
        ]);
        $tipes=tipe::find($id);
        $tipes->tipe=$request->tipe;
        $tipes->kode=$request->kode;
        $tipes->save();
        if(!$tipes){
            return back()->with('error','Data gagal disimpan !!');

        }else{
            return back()->with('success','Data berhasil disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tipes=tipe::find($id);
        $tipes->delete();
        if(!$tipes){
            return back()->with('error','Data gagal Dihapus !!');

        }else{
            return back()->with('success','Data berhasil Dihapus');
        }
    }
}
