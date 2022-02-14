<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipe;
use App\Models\Departement;
use App\Models\surat;

class suratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $surats=Surat::all();
        return view('surat.index',compact('surats'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departements=Departement::all();
        $tipes=tipe::all();
        return view('surat.create',compact('departements','tipes'));
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
            'nomor_surat'=>'required|unique:surats,nomor_surat',
            'tipe_kode'=>'required|max:2',
            'departement_singkatan'=>'required',
            'tanggal_surat'=>'required:surats,tanggal_surat',
            'perihal'=>'required:surats,perihal',
            'letter_file' => 'required|mimes:pdf|file',
        ]);
        if($request->file('letter_file')){
            $validated['letter_file'] = $request->file('letter_file')->store('assets/letter-file');
        }
        $date=$request['tanggal_surat'];
        $year=date('Y',strtotime($date));
        $month=date('F',strtotime($date));
        switch ($month){
            case "January": 
                $bulan="I";
            break;
            case "February":
                $bulan="II";
            break;
            case "March":
                $bulan="III";
            break;
            case "April":
                $bulan="IV";
            break;
            case "May":
                $bulan="V";
            break;
            case "June":
                $bulan="VI";
            break;
            case "July":
                $bulan="VII";
            break;
            case "August":
                $bulan="VIII";
            break;
            case "September":
                $bulan="IX";
            break;
            case "October":
                $bulan="X";
            break;
            case "November":
                $bulan="XI";
            break;
            case "December":
                $bulan="XII";
            break;
            }
        $penomoran=$request['tipe_kode'].".".$request['nomor_surat']."/".$request['departement_singkatan']."/".$bulan."/".$year;
        $surats=new Surat;
        $surats->nomor_surat=$penomoran;
        $surats->tanggal_surat=$request->tanggal_surat;
        $surats->perihal=$request->perihal;
        $surats->letter_file=$validated['letter_file'];
        $surats->save();
        if(!$surats){
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
    }
}
