@extends('layouts.app')

@section('content')
<div class="row text-center pt-4">
        <p>Tekan <b>Print Sertifikat</b> untuk melakukan print sertifikat</p>
        <a class="btn btn-outline-success" href="{{route('unduh_sertif', $pengajuan->id_pengajuan)}}">Print Sertifikat</a>
    <div class="col pt-5">
        <a class="btn btn-danger" href="{{route('list-pengajuan')}}">Selanjutnya</a>
    </div>
</div>
@endsection