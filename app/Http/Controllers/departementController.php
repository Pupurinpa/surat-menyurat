<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;

class departementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departements=departement::paginate(5);
        return view('departement.index',compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('departement.create');
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
            'nama_departement'=>'required|unique:departements,nama_departement',
            'singkatan'=>'required|max:3|unique:departements,singkatan',
        ]);
        $departements=new Departement;
        $departements->nama_departement=$request->nama_departement;
        $departements->singkatan=$request->singkatan;
        $departements->save();
        if(!$departements){
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
        $departements=Departement::find($id);
        return view('departement.show',compact('departements'));
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
        $departements=Departement::find($id);
        return view('departement.edit',compact('departements'));
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
            'nama_departement'=>'required|unique:departements,nama_departement',
            'singkatan'=>'required|max:3|unique:departements,singkatan',
        ]);
        $departements=Departement::find($id);
        $departements->nama_departement=$request->nama_departement;
        $departements->singkatan=$request->singkatan;
        $departements->save();
        if(!$departements){
            return back()->with('error','Data gagal di Update !!');

        }else{
            return back()->with('success','Data berhasil Di Update');
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
        $departements=Departement::find($id);
        $departements->delete();
        if(!$departements){
            return back()->with('error','Data gagal Dihapus !!');

        }else{
            return back()->with('success','Data berhasil Dihapus');
        }
    }
}
