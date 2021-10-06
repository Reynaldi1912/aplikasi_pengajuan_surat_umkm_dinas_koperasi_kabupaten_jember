@extends('layouts.app')

@section('content')
    <div class="container-fluid p-3">
        <div class="container-fluid bg-white p-3">
            <div class="row">
                <h4>Penolakan Ajuan</h4>
            </div>
            <hr>
            <div class="row pl-1">
                <div class="col"><p class="text-secondary">Nama Pengaju</p></div>
                <div class="col"><p class="text-secondary">Tanggal Pengajuan</p></div>
                <div class="col"><p class="text-secondary">Sesi Konsultasi</p></div>
            </div>
            <?php
                $day = date('l',strtotime($konsultasi->tanggal_pengajuan));
                $date = date('d F Y', strtotime($konsultasi->tanggal_pengajuan));
            ?>
            <div class="row pl-1">
                <div class="col"><p><b>{{$konsultasi->nama_pengaju}}</b></p></div>
                <div class="col"><p><b>{{$day}} , {{$date}}</b></p></div>
                <div class="col"><p><b>{{$konsultasi->sesi_konsultasi}}</b></p></div>
            </div>
            <div class="row pt-4">
                <p class="text-secondary">Keterangan</p>
            </div>
            <div class="row"><p><b>{{$konsultasi->keterangan}}</b></p></div>

            <form method="GET" action="{{ route('konsultasi.edit', $konsultasi->id_konsultasi) }}">
            @csrf
            <div class="row pt-4"><p>Kesalahan</p></div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="keterangan">
                </div> 
            </div>  
            <div class="row text-right mt-3">
                <div class="col"></div>
                <div class="col"><button type="submit" class="btn btn-danger">Ajukan Penolakan</button></div>
            </div> 
        </form>
    </div>
@endsection
