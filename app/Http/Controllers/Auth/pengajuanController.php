<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengajuan;
use App\Models\berkas;
use App\Models\data_diri;
use App\Models\usaha;
use App\Models\nilai_usaha;
use App\Models\User;
use Auth;




class pengajuanController extends Controller
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
        $path_link = array(route('list-pengajuan'),route('list-pengajuan'));
        $pengajuan = pengajuan::with('data_diri','usaha')->get();
        return view('pengajuan.list-pengajuan',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'pengajuan'=>$pengajuan]);
    }

    public function list_sertifikat()
    {
        $title = "Unggah Pengajuan Sertifikat";
        $path = array("Surat Keterangan Usaha","Pengajuan");
        $path_link = array(route('list-pengajuan-sertifikat'),route('list-pengajuan-sertifikat'));
        return view('pengajuan.list-sertifikat',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link]);
    }

    public function upload_sertifikat()
    {
        $title = "Unggah Pengajuan Sertifikat";
        $path = array("Surat Keterangan Usaha","Pengajuan");
        $path_link = array(route('list-pengajuan-sertifikat'),route('list-pengajuan-sertifikat'));
        return view('pengajuan.upload-sertifikat',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link]);
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
        $user = Auth::user();
        $title = "Pengajuan";
        $path = array("Surat Keterangan Usaha","Pengajuan","Detail");
        $path_link = array(route('list-pengajuan'),route('list-pengajuan'),"");
        $pengajuan = pengajuan::with('data_diri','usaha','berkas')->where('id_pengajuan',$id)->first();
        $usaha =usaha::with('nilai_usaha')->where('nilai_usaha_id',$pengajuan->usaha->nilai_usaha_id)->first();

        return view('pengajuan.detail-pengajuan',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link , 'pengajuan'=>$pengajuan ,'usaha'=>$usaha]);
    }

    public function unduh($id)
    {
        $user = Auth::user();
        $title = "Pengajuan";
        $path = array("Surat Keterangan Usaha","Pengajuan","Detail");
        $path_link = array(route('list-pengajuan'),route('list-pengajuan'),"");
        // $pengajuan = pengajuan::with('data_diri','usaha','berkas')->where('id_pengajuan',$id)->first();
        // $usaha =usaha::with('nilai_usaha')->where('nilai_usaha_id',$pengajuan->usaha->nilai_usaha_id)->first();

        return view('pengajuan.unduh-sertifikat',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link]);
    }

    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
   
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $berkas = berkas::all()->where()->first();

        $berkas->sertifikat = $imageName;
   
        return response()->json(['success'=>$imageName]);
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
