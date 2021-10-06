<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\konsultasi;
use App\Models\konsultasi_ditolak;
use App\Models\User;
use Auth;


class konsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Pengajuan";
        $path = array("Surat Keterangan Usaha","Pengajuan");
        $path_link = array(route('list-konsultasi'),route('list-konsultasi'));
        $list_konsultasi = konsultasi::all()->where('status_konsultasi','pending');
        return view('konsultasi.list-konsultasi',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'list_konsultasi'=>$list_konsultasi]);
    }
    public function index2()
    {
        $title = "Pengajuan";
        $path = array("Surat Keterangan Usaha","Pengajuan");
        $path_link = array(route('list-konsultasi'),route('list-konsultasi'));
        $list_konsultasi = konsultasi::all()->where('status_konsultasi','terima')
                                            ->where('tanggal_pengajuan',date("Y-m-d"));
        return view('konsultasi.konsultasi-hari-ini',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'list_konsultasi'=>$list_konsultasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $title = "Pengajuan";
        $path = array("Surat Keterangan Usaha","Pengajuan");
        $path_link = array(route('list-konsultasi'),route('list-konsultasi'));
        $konsultasi = konsultasi::all()->where('id_konsultasi',$id)->first();
        return view('konsultasi.tolak',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'konsultasi'=>$konsultasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request->validate([
            'keterangan' => 'required',
            ]);

        $k = konsultasi::all()->where('id_konsultasi',$id)->first();
        
        $k->status_konsultasi = 'ditolak';
        $k->save();

        $tolak = new konsultasi_ditolak;

        $tolak->konsultasi_id = $id;
        $tolak->keterangan = $request->get('keterangan');

        $tolak->save();

        return redirect()->route('list-konsultasi')->with('tolak',' Pengusaha Telah Dikirimkan E-Mail Penolakan');;
    }

    public function selesaikan_sesi(Request $request,$id)
    {

        $k = konsultasi::all()->where('id_konsultasi',$id)->first();
        $k->status_konsultasi = 'selesai_konsul';
        $k->save();
        return redirect()->route('list-konsultasi-hari-ini')->with('success',' Sesi '. $k->sesi_konsultasi .' untuk '. $k->nama_pengaju);;
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
        $k = konsultasi::all()->where('id_konsultasi',$id)->first();
        
        $k->status_konsultasi = $request->get('stts_konsul');
        $k->save();

        $day = date('l',strtotime($k->tanggal_pengajuan));
        $date = date('d F Y', strtotime($k->tanggal_pengajuan));

        return back()->with('success', "$day , $date");;
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
