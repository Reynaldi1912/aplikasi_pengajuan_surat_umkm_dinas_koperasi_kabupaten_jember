@extends('layouts.app')

@section('content')
   <div class="container bg-white pt-4 pb-4">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <h3><i class="fa fa-check-circle"></i> &nbsp;Pengajuan Diterima</h3>
        <p>&emsp;&ensp; Pengusaha Akan Datang Ke Diskopum untuk berkonsultasi pada , <b>{{$message}}</b></p>
    </div>
    @elseif($message = Session::get('tolak'))
    <div class="alert alert-success">
        <h3><i class="fa fa-check-circle"></i> &nbsp;Pengajuan Ditolak</h3>
        <p>&emsp;&ensp;{{$message}}</p>
    </div>
    @endif
   
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nama Pengaju</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Sesi Konsultasi</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($list_konsultasi as $lk)
                    <?php
                     $day = date('l',strtotime($lk->tanggal_pengajuan));
                     $date = date('d F Y', strtotime($lk->tanggal_pengajuan));
                    ?>
                <tr>
                    <form method="GET" action="{{ route('konsultasi.update', $lk->id_konsultasi) }}">
                        @csrf
                        <input type="hidden" value="terima" name="stts_konsul">

                        <td>{{$lk->nama_pengaju}}</td>
                        <td>{{$day}} , {{$date}}</td>
                        <td>{{$lk->sesi_konsultasi}}</td>
                        <td>{{$lk->keterangan}}</td>
                        <td>
                            <button type="submit" class="btn btn-danger">Terima &nbsp;<i class="fas fa-check"></i></button>&nbsp;
                        </form>
                            <a href="{{route('konsultasi.show',$lk->id_konsultasi)}}"><button class="btn btn-sm btn-primary-outline text-danger">Tolak &nbsp;<i class="fas fa-window-close"></i></button></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
   </div>
@endsection
