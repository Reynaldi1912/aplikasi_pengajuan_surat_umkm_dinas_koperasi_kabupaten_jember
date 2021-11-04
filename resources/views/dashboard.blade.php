@extends('layouts.app')

@section('content')
    <div class="container p-5 bg-white">
        @if ($message = Session::get('success'))
        <div class="container">
            <div class="alert alert-success">
                <h3><i class="fa fa-check-circle"></i> &nbsp;Pengajuan Selesai</h3>
                <p>&emsp;&ensp;<b>{{$message}}</b></p>
            </div>
        </div>
        @endif
        <h3><b>Pengajuan Surat Keterangan Usaha (SKU)</b></h3>
        <p class="text-secondary">Buat Surat Keterangan Usaha untuk bisnis anda agar legal dan bisa dikembangkan lebih jauh dan lebih baik lagi</p>
        <br>
        <p class="text-secondary"><b>DOKUMEN DISIAPKAN</b></p>
        <div class="row pt-2">
            <ul>
                <li>Surat Keterangan Usaha Dari Desa <br><p class="text-secondary">Pastikan anda sudah meminta Surat Keterangan Usaha dari Kepala Desa Anda terlebih dahulu</p></li>
                <li>Berkas Identitas <br><p class="text-secondary">Siapkan Scan KTP dan Scan Pas Foto Berwarna Anda</p></li>
                <li>Berkas Usaha <br><p class="text-secondary">Siapkan Foto Produk Usaha And</p></li>
                <li>Surat Pernyataan <br><p class="text-secondary">Isi dan Scan Surat Pernyataan sebagai tanda Anda mengisi data sebenar-benarnya</p></li>
            </ul>
        </div>
    </div>

    <div class="container p-5 mt-3 bg-white">
        <h3><b>Konsultasi</b></h3>
        <p class="text-secondary">Konsultasikan kendala anda dalam memulai dan menjalankan usaha dibantu oleh para ahli.</p>
    </div>
@endsection
