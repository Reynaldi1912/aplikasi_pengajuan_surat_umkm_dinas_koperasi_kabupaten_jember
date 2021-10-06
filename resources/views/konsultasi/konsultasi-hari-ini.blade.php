@extends('layouts.app')

@section('content')
<?php $b = 1;?>
    @foreach($list_konsultasi as $a)
    <div class="collapse multi-collapse container" id="multiCollapseExample{{$b}}">
        <div class="card card-body">
            <p class="text-secondary"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 0C8.95161 0 0 8.95161 0 20C0 31.0484 8.95161 40 20 40C31.0484 40 40 31.0484 40 20C40 8.95161 31.0484 0 20 0ZM20 7.74194C23.9194 7.74194 27.0968 10.9194 27.0968 14.8387C27.0968 18.7581 23.9194 21.9355 20 21.9355C16.0806 21.9355 12.9032 18.7581 12.9032 14.8387C12.9032 10.9194 16.0806 7.74194 20 7.74194ZM20 35.4839C15.2661 35.4839 11.0242 33.3387 8.18548 29.9839C9.70161 27.129 12.6694 25.1613 16.129 25.1613C16.3226 25.1613 16.5161 25.1935 16.7016 25.25C17.75 25.5887 18.8468 25.8064 20 25.8064C21.1532 25.8064 22.2581 25.5887 23.2984 25.25C23.4839 25.1935 23.6774 25.1613 23.871 25.1613C27.3306 25.1613 30.2984 27.129 31.8145 29.9839C28.9758 33.3387 24.7339 35.4839 20 35.4839Z" fill="#D26F73"/>
            </svg>&nbsp;
            Sesi {{$a->sesi_konsultasi}}</p>
            <h4><b>&emsp;&ensp;&ensp;{{$a->nama_pengaju}}</b></h4><br>
            <p><a href="{{route('selesai.sesi',$a->id_konsultasi)}}">&emsp;&ensp;&ensp;&ensp;<button class="btn btn-danger">Selesaikan Sesi</button></a></p>
        </div>
    </div>
    <?php
    $b++;
    ?>
    @endforeach

    @if ($message = Session::get('success'))
    <div class="container">
        <div class="alert alert-success">
            <h3><i class="fa fa-check-circle"></i> &nbsp;Konsultasi Selesai</h3>
            <p>&emsp;&ensp;Konsultasi <b>{{$message}}</b> telah selesai</p>
        </div>
    </div>
    @endif
   <div class="container bg-white pt-4 pb-4">
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
                    <?php
                    $i=1;
                    ?>
                    @foreach($list_konsultasi as $p)
                    <?php
                     $day = date('l',strtotime($p->tanggal_pengajuan));
                     $date = date('d F Y', strtotime($p->tanggal_pengajuan));
                    ?>
                <tr>
                    <td>{{$p->nama_pengaju}}</td>
                    <td>{{$day}} , {{$date}}</td>
                    <td>{{$p->sesi_konsultasi}}</td>
                    <td>{{$p->keterangan}}</td>
                    <td>
                        <button class="btn btn-sm btn-primary-outline text-danger" type="button" data-toggle="collapse" data-target="#multiCollapseExample{{$i}}" aria-expanded="false" aria-controls="multiCollapseExample{{$i}}">Hadir &nbsp;<i class="fas fa-check"></i></button>&nbsp;
                    </td>
                    <?php
                    $i++;
                    ?>
                </tr>
                @endforeach
            </tbody>
        </table>

   </div>
@endsection
