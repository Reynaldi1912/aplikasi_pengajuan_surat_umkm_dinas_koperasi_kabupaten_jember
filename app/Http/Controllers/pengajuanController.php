<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use App\Models\pengajuan;
use App\Models\berkas;
use App\Models\data_diri;
use App\Models\usaha;
use App\Models\nilai_usaha;
use App\Models\User;
use App\Models\pengajuan_ditolak;

use Auth;
use PDF;



$data_diri=array();
$berkas=array();
$informasi_usaha=array();

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
        $path = array("Home","Surat Keterangan Usaha");
        $path_link = array(route('home'),route('list-pengajuan'));
        $pengajuan = pengajuan::with('data_diri','usaha')->where('status','belum verifikasi')->get();
        return view('pengajuan.list-pengajuan',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'pengajuan'=>$pengajuan]);
    }

    public function list_sertifikat()
    {
        $title = "Unggah Pengajuan Sertifikat";
        $path = array("Home","Surat Keterangan Usaha");
        $path_link = array(route('home'),route('list-pengajuan-sertifikat'));
        $pengajuan = pengajuan::with('data_diri','usaha','berkas')->where('status','selesai verifikasi')->get();

        return view('pengajuan.list-sertifikat',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'pengajuan'=>$pengajuan]);
    }

    public function upload_sertifikat($id)
    {
        $title = "Unggah Pengajuan Sertifikat";
        $path = array("Surat Keterangan Usaha","Pengajuan");
        $path_link = array(route('list-pengajuan-sertifikat'),route('list-pengajuan-sertifikat'));
        $berkas = berkas::all()->where('id_berkas',$id)->first();
        // return $berkas;
        return view('pengajuan.upload-sertifikat',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'berkas'=>$berkas]);
    }
    public function kesalahan_pengajuan(Request $request, $id)
    {
        $title = "Unggah Pengajuan Sertifikat";
        $path = array("Surat Keterangan Usaha","Pengajuan");
        $path_link = array(route('list-pengajuan-sertifikat'),route('list-pengajuan-sertifikat'));

        $data_diri=array($request->get('nama_pengaju'),$request->get('tanggal_pengajuan'),$request->get('dusun_jalan'),$request->get('kelurahan_desa'),$request->get('kecamatan'));
        $berkas=array($request->get('scan_ktp'),$request->get('pas_foto'),$request->get('foto_produk'),$request->get('surat_pernyataan'),$request->get('sku'));
        $informasi_usaha=array($request->get('nama_usaha'),$request->get('jenis_usaha'),$request->get('kegiatan_usaha'),$request->get('tahun_mulai'),$request->get('modal_usaha'),$request->get('asset'),$request->get('omset'),$request->get('keuntungan'),$request->get('jumlah_tk'),$request->get('pinjaman_dana'),$request->get('ikut_pembinaan'));
        $pengajuan = pengajuan::with('data_diri','usaha','berkas')->where('id_pengajuan',$id)->first();
        $nilai_usaha = usaha::with('nilai_usaha')->where('id_usaha',$pengajuan->usaha_id)->first();

        $ada1=1;
        $ada2=1;
        $ada3=1;
        for($i=0 ; $i<count($data_diri);$i++){
            if($data_diri[$i] == "1"){$ada1=0;break;}
        }
        for($i=0 ; $i<count($berkas);$i++){
            if($berkas[$i]  == "1"){$ada2=0;break;}
        }
        for($i=0 ; $i<count($informasi_usaha);$i++){
            if($informasi_usaha[$i]  == "1"){$ada3=0;break;}
        }

        if($ada1==1 && $ada2==1 && $ada3==1){
            return redirect()->route('detail-pengajuan.unduh',$id);
        }else{
            return view('pengajuan.kesalahan_pengajuan',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'berkas'=>$berkas ,'data_diri'=>$data_diri,'informasi_usaha'=>$informasi_usaha,'pengajuan'=>$pengajuan,'nilai_usaha'=>$nilai_usaha]);
        }

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
        $request->validate([
            'scan_ktp' => 'required',
            'foto_produk' => 'required',
            'pas_foto' => 'required',
            'surat_pernyataan' => 'required',
            'sku' => 'required',
        ]);
            
        $scan_ktp = $request->file('scan_ktp');
        $foto_produk = $request->file('foto_produk');
        $pas_foto = $request->file('pas_foto');
        $surat_pernyataan = $request->file('surat_pernyataan');
        $sku = $request->file('sku');

        $scanKtpImage = time().'.'.$scan_ktp->extension();
        $fotoProdukImage = time().'.'.$foto_produk->extension();
        $pasFotoImage = time().'.'.$pas_foto->extension();
        $suratPeryataanImage = time().'.'.$surat_pernyataan->extension();
        $skuImage = time().'.'.$sku->extension();
   
   
        $scan_ktp->move(public_path('images'),$scanKtpImage);
        $foto_produk->move(public_path('images'),$fotoProdukImage);
        $pas_foto->move(public_path('images'),$pasFotoImage);
        $surat_pernyataan->move(public_path('images'),$suratPeryataanImage);
        $sku->move(public_path('images'),$skuImage);

        berkas::create([
            'scan_ktp' => $scanKtpImage,
            'pas_foto_berwarna' => $pasFotoImage,
            'foto_produk' =>  $fotoProdukImage,
            'surat_pernyataan' => $suratPeryataanImage,
            'sku_dari_desa' => $skuImage,
        ]);

        return redirect()->back();
 
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
        $pengajuan = pengajuan::all()->where('id_pengajuan',$id)->first();
        $path = array("Surat Keterangan Usaha","Pengajuan","Detail");
        $path_link = array(route('list-pengajuan'),route('list-pengajuan'),"");
        // return $pengajuan;

        return view('pengajuan.unduh-sertifikat',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link , 'pengajuan'=>$pengajuan]);
    }

    public function unduh_sertif($id){
        $show = pengajuan::with('usaha','berkas','data_diri')->find($id);
        $nilai_usaha = nilai_usaha::all()->where('id_nilai_usaha',$show->usaha->nilai_usaha_id)->first();
        $pdf = PDF::loadView('sertifikat',['show'=>$show,'nilai_usaha'=>$nilai_usaha])->setOptions(['defaultFont' => 'sans-serif']);
        
        $show->status = "selesai verifikasi";
        $show->save();
        return $pdf->stream();
    }

    public function dropzoneStore(Request $request,$id)
    {
        $image = $request->file('file');
   
        $imageName = time().'.'.$image->extension();

        $image->move(public_path('images'),$imageName);

        $berkas = berkas::all()->where('id_berkas',$id)->first();
        $berkas->sertifikat = $imageName;
        $berkas->save();

        $pengajuan = pengajuan::all()->where('berkas_id',$id)->first();
        $pengajuan->status = "sertifikat tertandatangan";
        $pengajuan->save();

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
    public function notifikasi(Request $request , $id){
        $getPengajuan = pengajuan::all()->where('id_pengajuan',$id)->first();
        $user = User::all()->where('id',$getPengajuan->users_id)->first();

        $array = array('nama_pengaju','tanggal_pengajuan','dusun_jalan','kelurahan_desa','kecamatan',
                        'scan_ktp','pas_foto','foto_produk','surat_pernyataan','sku','nama_usaha','jenis_usaha','kegiatan_usaha'
                        ,'tahun_mulai','modal_usaha','asset','omset','keuntungan','jumlah_tk','pinjaman_dana','ikut_pembinaan');
        for($i = 0 ; $i < count($array) ;$i++){
        $kesalahan = new pengajuan_ditolak;
            if($request->get($array[$i])!=null){
                $kesalahan->pengajuan_id=$id;
                $kesalahan->keterangan = $request->get($array[$i]);
                $kesalahan->save();
            }
        }
        $getPengajuan->status = 'ditolak';
        $getPengajuan->save();

        $pengajuan_ditolak = pengajuan_ditolak::all()->where('pengajuan_id',$id);

        

        Mail::to($user->email)->send(new MailNotify($pengajuan_ditolak));
        return redirect()->route('list-pengajuan')->with('success','Pengajuan ditolak');
    }
}
