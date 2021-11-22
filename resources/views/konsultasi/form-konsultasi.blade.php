@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div class="container">
        <div class="alert alert-success">
            <h3><i class="fa fa-check-circle"></i> &nbsp;{{$message}}</h3>
            <p>&emsp;&ensp;Konsultasi <b>{{$message}}</b></p>
        </div>
    </div>
    @endif

    @if($active)
    <div class="container">
        <div class="alert bg-white">
            <h3>
            @isset($konsultasi) 
                @if($konsultasi->status_konsultasi == 'terima')
                    <i class="fa fa-pencil-alt"></i> &nbsp; Anda Telah Mendaftar Konsultasi 
                @elseif($konsultasi->status_konsultasi == 'pending') 
                    <i class="fa fa-clock"></i> &nbsp; Pengajuan Konsultasi anda sedang menunggu Konfirmasi 
                @endif 
            @endisset</h3>
            <p>Sesi {{ $konsultasi->sesi_konsultasi }} {{Carbon\Carbon::parse($konsultasi->tanggal_pengajuan)->format('D, d M y')}}</p>
            @if($konsultasi->status_konsultasi == 'terima')
            <form action="{{route('pengajuan.konsultasi.batal', $konsultasi->id_konsultasi)}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="action" value="batal">
                <button class="btn btn-danger" type="submit">Batalkan Konsultasi</button>
            </form>
            @endif
        </div>
    </div>
    @else
    <form action="{{route('pengajuan.konsultasi')}}" method="GET">
        @csrf
    <div class="container row pt-5">
        <div class="col"></div>
        <div class="col-8">
           <div class="row">
                <p><b>Nama Lengkap</b></p>
                    <input placeholder="Nama lengkap" type="text" name="nama_lengkap"  class="form-control {{$errors->first('nama_lengkap') ? "is-invalid" : "" }}" id="nama_lengkap">
                    @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

           </div>  
           <div class="row mt-5">
               <div class="col-6">
                 <label for="sesi" class="form-label">Sesi Konsultasi</label>
                    <select class="form-select" class="form-control {{$errors->first('sesi') ? "is-invalid" : "" }}" id="sesi" aria-describedby="sesi" name="sesi">
                        <option value="1 , 09.00" selected>1 , 09.00</option>
                        <option value="2 , 12.00">2 , 12.00</option>
                        <option value="3 , 15.00">3 , 15.00</option>
                    </select>
                    @error('sesi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
               </div>
               <div class="col-6">
                    <label for="sesi" class="form-label">Tanggal Konsultasi</label>
                    <input type="date"  name="tanggal_konsultasi"  class="form-control {{$errors->first('tanggal_konsultasi') ? "is-invalid" : "" }}" id="tanggal_konsultasi">
                    @error('tanggal_konsultasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
               </div>
           </div> 
           <div class="row mt-5">
                    <label for="keterangan" class="form-label">Keterangan</label><br>
                       <textarea placeholder="Jelaskan Mengapa Anda Ingin Berkonsultasi" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
           </div>
        </div>
        <div class="col"></div>
    </div>

    <div class="container mt-5 pt-5 pb-5">
        <div class="row">
            <div class="col"></div>
            <div class="col text-right">
                <button class="btn btn-danger" type="submit">Ajukan Konsultasi</button>
            </div>
        </div>
    </div>
    @endif
@endsection
