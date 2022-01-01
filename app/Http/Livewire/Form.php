<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\pengajuan;
use App\Models\berkas;
use App\Models\data_diri;
use App\Models\usaha;
use App\Models\nilai_usaha;
use App\Models\oracle;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $currentStep = 1;
    public $nama_lengkap, $nama_dusun, $nama_kelurahan, $nama_kecamatan , $telp , $users_id , $nik;
    public $nama_usaha , $jenis_usaha , $kegiatan_usaha , $tahun_mulai , $modal , $asset ,$omset , $keuntungan , $jumlah_tk , $pinjaman_dana , $ikut_pembinaan;
    public $scan_ktp , $pas_foto , $foto_produk , $surat_pernyataan , $sku;
    public $successMessage = '';

    public function oracle() {
        $data = new oracle;
        return $data;
    }

    public function firstStepSubmit()
    {
         $validatedData = $this->validate([
            'nama_lengkap' => 'required',
            'nama_dusun' => 'required',
            'nama_kelurahan' => 'required',
            'nama_kecamatan' => 'required',
            'telp' =>'required|numeric',
            'nik' => 'required|numeric|starts_with:3509|digits_between:16,16'
        ],[
            'nik.starts_with' => 'Pemilik Usaha Harus ber NIK Jember',
            'nik.digits_between' => 'NIK harus 16 Angka'  
        ]);            

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {


        $validatedData = $this->validate([
            'nama_usaha' => 'required',
            'jenis_usaha'=>'required',  
            'kegiatan_usaha'=>'required', 
            'tahun_mulai'=> 'required',  
            'modal'=>'required|numeric',   
            'asset'=>'required|numeric',   
            'omset'=>'required|numeric',   
            'keuntungan'=>'required|numeric',   
            'jumlah_tk'=>'required|numeric',   
            'pinjaman_dana'=>'required',   
            'ikut_pembinaan'=>'required',   
        ]);
  
        $this->currentStep = 3;
    }
  
    public function submitForm()
    {

        data_diri::create([
            'nama_pengaju' => $this->nama_lengkap,
            'kelurahan_desa' => $this->nama_kelurahan,
            'tanggal_pengajuan' =>  date("Y-m-d"),
            'dusun_jalan' => $this->nama_dusun,
            'kecamatan' => $this->nama_kecamatan,
            'no_telp' => $this->telp
        ]);

        nilai_usaha::create([
            'modal_usaha' => $this->modal,
            'asset' => $this->asset,
            'omset' =>  $this->omset,
            'keuntungan' => $this->keuntungan,
            'jumlah_tenaga_kerja' => $this->jumlah_tk,
        ]);
        $nu = nilai_usaha::all()->last();


        usaha::create([
            'nilai_usaha_id' => $nu->id_nilai_usaha,
            'nama_usaha' =>$this->nama_usaha,
            'jenis_usaha' => $this->jenis_usaha,
            'kegiatan_usaha' =>  $this->kegiatan_usaha,
            'tanggal_usaha_mulai' => $this->tahun_mulai,
            'pinjaman_dana' => $this->pinjaman_dana,
            'ikut_pembinaan_usaha' => $this->ikut_pembinaan,
        ]);
           
    }
  
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    public function clearForm()
    {
        $this->name = '';
        $this->username = '';
        $this->birth_place = '';
        $this->birth_date = '';
        $this->status = '';
        $this->email = '';
        $this->phone = '';
    }
    
    public function render()
    {
        return view('form');
    }

    public function uploadFile(Request $request, $oke) 
    {
        $result = '';
        $file = $request->file($oke);
        $name = $file->getClientOriginalName();

        $extension = explode('.',$name);
        $extension = strtolower(end($extension));

        $key = rand().'.'.$oke;
        $tmp_file_name = "{$key}.{$extension}";
        $tmp_file_path = public_path('images');
        $file->move($tmp_file_path,$tmp_file_name);

        $result = public_path('images').'/'.$tmp_file_name;
        return $result;
    }

    public function store (Request $request){
        $request->validate([
            'scan_ktp' => 'required',
            'foto_produk' => 'required',
            'pas_foto' => 'required',
            'surat_pernyataan' => 'required',
            'sku' => 'required',

        ]);
            
        //    $scan_ktp = $request->file('scan_ktp');
        //    $foto_produk = $request->file('foto_produk');
        //    $pas_foto = $request->file('pas_foto');
        //    $surat_pernyataan = $request->file('surat_pernyataan');
        //    $sku = $request->file('sku');
           
        //    $scanKtpImage = time().'1'.'.'.$scan_ktp->extension();
        //    $fotoProdukImage = time().'2'.'.'.$foto_produk->extension();
        //    $pasFotoImage = time().'3'.'.'.$pas_foto->extension();
        //    $suratPeryataanImage = time().'4'.'.'.$surat_pernyataan->extension();
        //    $skuImage = time().'5'.'.'.$sku->extension();
   
   
        //    $scan_ktp->move(public_path('images'),$scanKtpImage);
        //    $foto_produk->move(public_path('images'),$fotoProdukImage);
        //    $pas_foto->move(public_path('images'),$pasFotoImage);
        //    $surat_pernyataan->move(public_path('images'),$suratPeryataanImage);
        //    $sku->move(public_path('images'),$skuImage);

        $scan_ktp = $this->uploadFile($request,'scan_ktp');
        $foto_produk = $this->uploadFile($request,'foto_produk');
        $pas_foto = $this->uploadFile($request,'pas_foto');
        $surat_pernyataan = $this->uploadFile($request,'surat_pernyataan');
        $sku = $this->uploadFile($request,'sku');
   
        $fn_scan_ktp = $scan_ktp;
        $fn_foto_produk = $foto_produk;
        $fn_pas_foto = $pas_foto;
        $fn_surat_pernyataan = $surat_pernyataan;
        $fn_sku = $sku;
   
        $up_scan_ktp = $this->oracle()->upFileOracle($fn_scan_ktp);
        $up_foto_produk = $this->oracle()->upFileOracle($fn_foto_produk);
        $up_pas_foto = $this->oracle()->upFileOracle($fn_pas_foto);
        $up_surat_pernyataan = $this->oracle()->upFileOracle($fn_surat_pernyataan);
        $up_sku = $this->oracle()->upFileOracle($fn_sku);
   
           berkas::create([
            // 'scan_ktp' => $scanKtpImage,
            // 'pas_foto_berwarna' => $pasFotoImage,
            // 'foto_produk' =>  $fotoProdukImage,
            // 'surat_pernyataan' => $suratPeryataanImage,
            // 'sku_dari_desa' => $skuImage,
            'scan_ktp' => $up_scan_ktp['message'],
            'pas_foto_berwarna' => $up_pas_foto['message'],
            'foto_produk' =>  $up_foto_produk['message'],
            'surat_pernyataan' => $up_surat_pernyataan['message'],
            'sku_dari_desa' => $up_sku['message']
            ]);

            
            $dd=data_diri::all()->last();
            $u = usaha::all()->last();
            $b =berkas::all()->last();
            $user = auth()->user()->id;
            
            $pengajuan = new pengajuan;
            $pengajuan->users_id = $user;
            $pengajuan->data_diri_id = $dd->id_data_diri;
            $pengajuan->usaha_id = $u->id_usaha;
            $pengajuan->berkas_id = $b->id_berkas;
            $pengajuan->status = "belum verifikasi";

            $pengajuan->save();

            return redirect()->route('home')->with('success','Pengajuan Berhasil Diajukan');        

    }

}