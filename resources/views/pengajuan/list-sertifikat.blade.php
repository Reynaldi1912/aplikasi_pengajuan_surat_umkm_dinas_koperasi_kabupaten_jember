@extends('layouts.app')

@section('content')
   <div class="container bg-white pt-4 pb-4">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nama Pengaju</th>
                <th scope="col">Tanggal Pengaju</th>
                <th scope="col">Nama Usaha</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pengajuan as $b)
                    <?php
                     $day = date('l',strtotime($b->data_diri->tanggal_pengajuan));
                     $date = date('d F Y', strtotime($b->data_diri->tanggal_pengajuan));
                    ?>

                <tr>
                    <td>{{$b->data_diri->nama_pengaju}}</td>
                    <td>{{$day}}, {{$date}}</td>
                    <td>{{$b->usaha->nama_usaha}}</td>
                    <td><a href="{{route('upload.sertifikat',$b->berkas->id_berkas)}}">Unggah Sertifikat &nbsp;&nbsp;<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.04159 10.3324H5.95825C5.6119 10.3324 5.33325 10.0538 5.33325 9.7074V5.3324H3.0494C2.58586 5.3324 2.35409 4.7725 2.68221 4.44438L6.64315 0.480835C6.83846 0.285522 7.15877 0.285522 7.35409 0.480835L11.3176 4.44438C11.6458 4.7725 11.414 5.3324 10.9504 5.3324H8.66659V9.7074C8.66659 10.0538 8.38794 10.3324 8.04159 10.3324ZM13.6666 10.1241V13.0407C13.6666 13.3871 13.3879 13.6657 13.0416 13.6657H0.958252C0.611898 13.6657 0.333252 13.3871 0.333252 13.0407V10.1241C0.333252 9.77771 0.611898 9.49906 0.958252 9.49906H4.49992V9.7074C4.49992 10.5121 5.15356 11.1657 5.95825 11.1657H8.04159C8.84627 11.1657 9.49992 10.5121 9.49992 9.7074V9.49906H13.0416C13.3879 9.49906 13.6666 9.77771 13.6666 10.1241ZM10.4374 12.4157C10.4374 12.1293 10.203 11.8949 9.91659 11.8949C9.63013 11.8949 9.39575 12.1293 9.39575 12.4157C9.39575 12.7022 9.63013 12.9366 9.91659 12.9366C10.203 12.9366 10.4374 12.7022 10.4374 12.4157ZM12.1041 12.4157C12.1041 12.1293 11.8697 11.8949 11.5833 11.8949C11.2968 11.8949 11.0624 12.1293 11.0624 12.4157C11.0624 12.7022 11.2968 12.9366 11.5833 12.9366C11.8697 12.9366 12.1041 12.7022 12.1041 12.4157Z" fill="#C23436"/>
                    </svg>
                    </a></td>
                </tr>
                @endforeach

            </tbody>
        </table>

   </div>
@endsection
