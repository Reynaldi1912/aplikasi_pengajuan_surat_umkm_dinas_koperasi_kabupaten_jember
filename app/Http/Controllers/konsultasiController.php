<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\konsultasi;
use App\Models\konsultasi_ditolak;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\konsultasiDiterima;
use App\Mail\konsultasiDitolak;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth as Auth;
use App\Mail\konsultasiPelanggaran;

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
        $path = array("Konsultasi","Pengajuan");
        $path_link = array(route('list-konsultasi'),route('list-konsultasi'));
        $list_konsultasi = konsultasi::all()->where('status_konsultasi','pending');
        return view('konsultasi.list-konsultasi',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'list_konsultasi'=>$list_konsultasi]);
    }
    public function index2()
    {
        $title = "Pengajuan";
        $path = array("Konsultasi","Pengajuan");
        $path_link = array(route('list-konsultasi'),route('list-konsultasi'));
        $list_konsultasi = konsultasi::all()->where('status_konsultasi','terima')->where('tanggal_pengajuan',date("Y-m-d"));

        $count = konsultasi::all()->where('status_konsultasi','terima')->where('tanggal_pengajuan',date("Y-m-d", strtotime( '-1 days' )))->count();
        for ($i=0; $i < $count ; $i++) { 
            $list_konsultasi_tidak_hadir = konsultasi::with('User')->where('status_konsultasi','terima')->where('tanggal_pengajuan',date("Y-m-d", strtotime( '-1 days' )))->first();
            $list_konsultasi_tidak_hadir->status_konsultasi = 'tidak_hadir';
            $list_konsultasi_tidak_hadir->save();
        }
           
            // $currentuserid  = Auth::user()->id;
            // $konsultasi = konsultasi::with('User')->where('users_id',$currentuserid)->first();
            // $day = date('l',strtotime($konsultasi->tanggal_pengajuan));
            // $date = date('d F Y', strtotime($konsultasi->tanggal_pengajuan));

            // $tanggal_konsultasi = Carbon::createFromFormat('Y-m-d H:i:s', $konsultasi->updated_at);
            // $daysToAdd = 14;
            // $date_next = $tanggal_konsultasi->addDays($daysToAdd)->format('d F Y');
            // $day_next = date('l',strtotime($date_next));
            
            // Mail::to($konsultasi->User->email)->send(new konsultasiPelanggaran($day,$date,$day_next,$date_next,$konsultasi));
                    
            // return $;
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
        $request->validate([
            'nama_lengkap' => 'required',
            'keterangan' => 'required',
            'tanggal_konsultasi => required'
        ]);

        $konsultasi = new konsultasi;
        $konsultasi->users_id = Auth::user()->id;
        $konsultasi->nama_pengaju = $request->get('nama_lengkap');
        $konsultasi->sesi_konsultasi = $request->get('sesi');
        $konsultasi->tanggal_pengajuan = $request->get('tanggal_konsultasi');
        $konsultasi->keterangan = $request->get('keterangan');
        $konsultasi->status_konsultasi = "pending";

        $konsultasi->save();

        return redirect()->route('form-konsultasi')->with('success','Pengajuan Anda Telah Diajukan');
    }
    public function form(){
        $different_days = null;
        $tanggal_konsultasi_selanjutnya = null;

        $currentuserid  = Auth::user()->id;
        $title = "Konsultasi";
        $path = array("Dashboard","Konsultasi");
        $path_link = array(route('home'),route('form-konsultasi'));
        $pelanggaran = 'tidak';
        $cek_tidak_hadir = konsultasi::with('User')->where('users_id',$currentuserid)->where('status_konsultasi','tidak_hadir')->count();
        $cek_next_konsul = konsultasi::with('User')->Where('users_id',$currentuserid)->where('status_konsultasi','menunggu_konsul_selanjutnya')->count();

        $status = konsultasi::where('users_id', Auth::id())
        ->where('tanggal_pengajuan', '>=', Carbon::today())
        ->whereIn('status_konsultasi', ['pending', 'terima'])
        ->first();
        
        if ($cek_tidak_hadir > 0) {
            $mytime = Carbon::now();
            $pelanggaran = 'ya';
            $get_tidak_hadir = konsultasi::with('User')->where('users_id',$currentuserid)->where('status_konsultasi','tidak_hadir')->first();
            $tanggal_cek_konsultasi = Carbon::createFromFormat('Y-m-d H:i:s', $get_tidak_hadir->updated_at);
            $tanggal_konsultasi = Carbon::createFromFormat('Y-m-d H:i:s', $get_tidak_hadir->updated_at);
            $daysToAdd = 14;
            $check_date_konsultasi = $tanggal_cek_konsultasi->addDays($daysToAdd)->format('Y-m-d');
            $tanggal_konsultasi_selanjutnya = $tanggal_konsultasi->addDays($daysToAdd)->format('d F Y');
            $different_days = $mytime->diffInDays($tanggal_konsultasi_selanjutnya);

            if (strtotime(date("Y-m-d")) < strtotime($check_date_konsultasi)) {
                
                $day = date('l',strtotime($get_tidak_hadir->tanggal_pengajuan));
                $date = date('d F Y', strtotime($get_tidak_hadir->tanggal_pengajuan));
                $day_next = date('l',strtotime($tanggal_konsultasi_selanjutnya));

                Mail::to($get_tidak_hadir->User->email)->send(new konsultasiPelanggaran($day,$date,$day_next,$tanggal_konsultasi_selanjutnya,$get_tidak_hadir));

                return view('konsultasi.form-konsultasi',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'pelanggaran'=>$pelanggaran,'next'=>$tanggal_konsultasi_selanjutnya,
                'different'=>$different_days,'active' => ($status) ? true : false,
                'konsultasi' => ($status) ? $status : null]);
            }else{
                $get_tidak_hadir = konsultasi::with('User')->where('users_id',$currentuserid)->where('status_konsultasi','tidak_hadir')->first();
                $get_tidak_hadir->status_konsultasi = "selesai_konsul";
                $get_tidak_hadir->save();
            }
        }

        if ($cek_next_konsul > 0) {
            $pelanggaran = 'menunggu_next_konsul';
            $get_user = konsultasi::with('User')->where('users_id',$currentuserid)->where('status_konsultasi','menunggu_konsul_selanjutnya')->first();
            $tanggal_konsultasi = Carbon::createFromFormat('Y-m-d H:i:s', $get_user->updated_at);
            $daysToAdd = 7;
            $tanggal_konsultasi_selanjutnya = $tanggal_konsultasi->addDays($daysToAdd)->format('d F Y');
            $mytime = Carbon::now();
            $different_days = $mytime->diffInDays($tanggal_konsultasi_selanjutnya);
            $different_days = $different_days+1;
    
            return view('konsultasi.form-konsultasi',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'pelanggaran'=>$pelanggaran,'next'=>$tanggal_konsultasi_selanjutnya,'different'=>$different_days,'active' => ($status) ? true : false,
            'konsultasi' => ($status) ? $status : null]);
        }

        $cek_tidak_hadir = konsultasi::with('User')->where('users_id',$currentuserid)->where('status_konsultasi','tidak_hadir')->count();
        $cek_next_konsul = konsultasi::with('User')->Where('users_id',$currentuserid)->where('status_konsultasi','menunggu_konsul_selanjutnya')->count();
        
        if($cek_next_konsul <= 0 && $cek_tidak_hadir <= 0){
            $pelanggaran = "tidak";
        }

        return view('konsultasi.form-konsultasi',['title'=>$title , 'path'=>$path, 'path_link'=>$path_link,'pelanggaran'=>$pelanggaran,'next'=>$tanggal_konsultasi_selanjutnya,'different'=>$different_days,'active' => ($status) ? true : false,
        'konsultasi' => ($status) ? $status : null]);
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

        $k = konsultasi::with('User')->where('id_konsultasi',$id)->first();
        
        $k->status_konsultasi = 'ditolak';
        $k->save();

        
        $tolak = new konsultasi_ditolak;

        $tolak->konsultasi_id = $id;
        $tolak->keterangan = $request->get('keterangan');

        $tolak->save();

        $tolak = konsultasi_ditolak::all()->where('konsultasi_id',$id)->first();
        Mail::to($k->User->email)->send(new konsultasiDitolak($tolak));


        return redirect()->route('list-konsultasi')->with('tolak',' Pengusaha Telah Dikirimkan E-Mail Penolakan');;
    }

    public function selesaikan_sesi(Request $request,$id)
    {

        $k = konsultasi::all()->where('id_konsultasi',$id)->first();
        $k->status_konsultasi = 'menunggu_konsul_selanjutnya';

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
        $konsultasi = konsultasi::with('User')->where('id_konsultasi',$id)->first();

        if($request->action == 'batal'){
            $konsultasi->update([
                'status_konsultasi' => 'batal_konsul'
            ]);

            return redirect()->route('form-konsultasi')
                ->with('success','Pengajuan Konsultasi Anda Telah Dibatalkan');
        }
        
        $konsultasi->status_konsultasi = $request->get('stts_konsul');
        $konsultasi->save();

        $day = date('l',strtotime($konsultasi->tanggal_pengajuan));
        $date = date('d F Y', strtotime($konsultasi->tanggal_pengajuan));

        Mail::to($konsultasi->User->email)->send(new konsultasiDiterima($day,$date,$konsultasi));

        return back()->with('success', "$day , $date");;
    }

    public function batalkan_konsultasi($id){
        $konsultasi = konsultasi::findOrFail($id);
        $konsultasi->update([
            'status_konsultasi' => 'batal_konsul'
        ]);
        return redirect()->route('form-konsultasi')
            ->with('success','Pengajuan Konsultasi Anda Telah Dibatalkan');
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
