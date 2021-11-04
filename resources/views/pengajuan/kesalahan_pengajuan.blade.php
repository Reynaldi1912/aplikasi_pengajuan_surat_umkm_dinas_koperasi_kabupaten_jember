@extends('layouts.app')

@section('content')
<form action="{{route('notifikasi',$pengajuan->id_pengajuan)}}" method="get">
    @csrf
<div class="content" style="background-color:#f4f6f5">
    <div class="container p-3 bg-white">
        <div class="row pb-2"><h3>Data Diri</h3></div>
        <hr>
        @if($data_diri[0] == 1)
            <div class="row pt-2"><p class="text-secondary">Nama Pengaju</p></div>
            <div class="row"><p><b>{{$pengajuan->data_diri->nama_pengaju}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="nama_pengaju">
            </div> 
        @endif
        @if($data_diri[1] == 1)
            <div class="row pt-2"><p class="text-secondary">Tanggal Pengajuan</p></div>
            <div class="row"><p><b>{{$pengajuan->data_diri->tanggal_pengajuan}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="tanggal_pengajuan">
            </div> 
        @endif
        @if($data_diri[2] == 1)
            <div class="row pt-2"><p class="text-secondary">Dusun / Jalan</p></div>
            <div class="row"><p><b>{{$pengajuan->data_diri->dusun_jalan}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="dusun_jalan">
            </div> 
        @endif
        @if($data_diri[3] == 1)
            <div class="row pt-2"><p class="text-secondary">Kelurahan / Desa</p></div>
            <div class="row"><p><b>{{$pengajuan->data_diri->kelurahan_desa}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="kelurahan_desa">
            </div> 
        @endif
        @if($data_diri[4] == 1)
            <div class="row pt-2"><p class="text-secondary">Kecamatan</p></div>
            <div class="row"><p><b>{{$pengajuan->data_diri->kecamatan}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="kecamatan">
            </div> 
        @endif
    </div>

    <!-- BERKAS -->
    <div class="container p-3 bg-white mt-5">
        <div class="row pb-2"><h3>Berkas</h3></div>
        <hr>
        @if($berkas[0] == 1)
            <div class="row pt-2"><p class="text-secondary">Scan KTP</p></div>
            <button type="button" class="btn btn-sm btn-primary-outline text-danger" data-bs-toggle="modal" data-bs-target="#scanKTP">
                <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.25 5.3125V0H1.4375C0.917969 0 0.5 0.417969 0.5 0.9375V19.0625C0.5 19.582 0.917969 20 1.4375 20H14.5625C15.082 20 15.5 19.582 15.5 19.0625V6.25H10.1875C9.67188 6.25 9.25 5.82812 9.25 5.3125ZM11.75 14.5312C11.75 14.7891 11.5391 15 11.2812 15H4.71875C4.46094 15 4.25 14.7891 4.25 14.5312V14.2188C4.25 13.9609 4.46094 13.75 4.71875 13.75H11.2812C11.5391 13.75 11.75 13.9609 11.75 14.2188V14.5312ZM11.75 12.0312C11.75 12.2891 11.5391 12.5 11.2812 12.5H4.71875C4.46094 12.5 4.25 12.2891 4.25 12.0312V11.7188C4.25 11.4609 4.46094 11.25 4.71875 11.25H11.2812C11.5391 11.25 11.75 11.4609 11.75 11.7188V12.0312ZM11.75 9.21875V9.53125C11.75 9.78906 11.5391 10 11.2812 10H4.71875C4.46094 10 4.25 9.78906 4.25 9.53125V9.21875C4.25 8.96094 4.46094 8.75 4.71875 8.75H11.2812C11.5391 8.75 11.75 8.96094 11.75 9.21875ZM15.5 4.76172V5H10.5V0H10.7383C10.9883 0 11.2266 0.0976562 11.4023 0.273438L15.2266 4.10156C15.4023 4.27734 15.5 4.51562 15.5 4.76172Z" fill="#CC5C5E"/>
                </svg>
                &nbsp
                <b>Scan File KTP</b>
            </button>            
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="scan_ktp">
            </div> 
        @endif
        @if($berkas[1] == 1)
            <div class="row pt-2"><p class="text-secondary">Pas Foto Berwarna</p></div>
            <button type="button" class="btn btn-sm btn-primary-outline text-danger" data-bs-toggle="modal" data-bs-target="#pasFoto">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 4.76332V5H10.5V0H10.7367C10.9853 1.29998e-06 11.2238 0.0987666 11.3996 0.27457L15.2254 4.10039C15.4012 4.27621 15.5 4.51467 15.5 4.76332ZM10.1875 6.25C9.67188 6.25 9.25 5.82812 9.25 5.3125V0H1.4375C0.919727 0 0.5 0.419727 0.5 0.9375V19.0625C0.5 19.5803 0.919727 20 1.4375 20H14.5625C15.0803 20 15.5 19.5803 15.5 19.0625V6.25H10.1875ZM4.89629 6.875C5.93184 6.875 6.77129 7.71445 6.77129 8.75C6.77129 9.78555 5.93184 10.625 4.89629 10.625C3.86074 10.625 3.02129 9.78555 3.02129 8.75C3.02129 7.71445 3.86078 6.875 4.89629 6.875ZM13.0213 16.25H3.02129L3.04023 14.3561L4.58379 12.8125C4.76684 12.6295 5.04469 12.6484 5.22773 12.8314L6.77129 14.375L10.8148 10.3314C10.9979 10.1484 11.2947 10.1484 11.4778 10.3314L13.0213 11.875V16.25Z" fill="#CC5C5E"/>
                                    </svg>
                                    &nbsp
                                    <b>Pas Foto Berwarna</b>
                                </button>            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="pas_foto">
            </div> 
        @endif
        @if($berkas[2] == 1)
            <div class="row pt-2"><p class="text-secondary">Foto Produk</p></div>
            <button type="button" class="btn btn-sm btn-primary-outline text-danger" data-bs-toggle="modal" data-bs-target="#fotoProduk">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 4.76332V5H10.5V0H10.7367C10.9853 1.29998e-06 11.2238 0.0987666 11.3996 0.27457L15.2254 4.10039C15.4012 4.27621 15.5 4.51467 15.5 4.76332ZM10.1875 6.25C9.67188 6.25 9.25 5.82812 9.25 5.3125V0H1.4375C0.919727 0 0.5 0.419727 0.5 0.9375V19.0625C0.5 19.5803 0.919727 20 1.4375 20H14.5625C15.0803 20 15.5 19.5803 15.5 19.0625V6.25H10.1875ZM4.89629 6.875C5.93184 6.875 6.77129 7.71445 6.77129 8.75C6.77129 9.78555 5.93184 10.625 4.89629 10.625C3.86074 10.625 3.02129 9.78555 3.02129 8.75C3.02129 7.71445 3.86078 6.875 4.89629 6.875ZM13.0213 16.25H3.02129L3.04023 14.3561L4.58379 12.8125C4.76684 12.6295 5.04469 12.6484 5.22773 12.8314L6.77129 14.375L10.8148 10.3314C10.9979 10.1484 11.2947 10.1484 11.4778 10.3314L13.0213 11.875V16.25Z" fill="#CC5C5E"/>
                                    </svg>
                                    &nbsp
                                    <b>Foto Produk</b>
                                </button>            
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="foto_produk">
            </div> 
        @endif
        @if($berkas[3] == 1)
            <div class="row pt-2"><p class="text-secondary">Surat Pernyataan</p></div>
            <button type="button" class="btn btn-sm btn-primary-outline text-danger" data-bs-toggle="modal" data-bs-target="#sk">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.25 5.3125V0H1.4375C0.917969 0 0.5 0.417969 0.5 0.9375V19.0625C0.5 19.582 0.917969 20 1.4375 20H14.5625C15.082 20 15.5 19.582 15.5 19.0625V6.25H10.1875C9.67188 6.25 9.25 5.82812 9.25 5.3125ZM11.75 14.5312C11.75 14.7891 11.5391 15 11.2812 15H4.71875C4.46094 15 4.25 14.7891 4.25 14.5312V14.2188C4.25 13.9609 4.46094 13.75 4.71875 13.75H11.2812C11.5391 13.75 11.75 13.9609 11.75 14.2188V14.5312ZM11.75 12.0312C11.75 12.2891 11.5391 12.5 11.2812 12.5H4.71875C4.46094 12.5 4.25 12.2891 4.25 12.0312V11.7188C4.25 11.4609 4.46094 11.25 4.71875 11.25H11.2812C11.5391 11.25 11.75 11.4609 11.75 11.7188V12.0312ZM11.75 9.21875V9.53125C11.75 9.78906 11.5391 10 11.2812 10H4.71875C4.46094 10 4.25 9.78906 4.25 9.53125V9.21875C4.25 8.96094 4.46094 8.75 4.71875 8.75H11.2812C11.5391 8.75 11.75 8.96094 11.75 9.21875ZM15.5 4.76172V5H10.5V0H10.7383C10.9883 0 11.2266 0.0976562 11.4023 0.273438L15.2266 4.10156C15.4023 4.27734 15.5 4.51562 15.5 4.76172Z" fill="#CC5C5E"/>
                                    </svg>
                                    &nbsp
                                    <b>Surat Pernyataan</b>
                                </button>            
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="surat_pernyataan">
            </div> 
        @endif
        @if($berkas[4] == 1)
            <div class="row pt-2"><p class="text-secondary">SKU Dari Desa</p></div>
            <button type="button" class="btn btn-sm btn-primary-outline text-danger" data-bs-toggle="modal" data-bs-target="#skuDesa">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.25 5.3125V0H1.4375C0.917969 0 0.5 0.417969 0.5 0.9375V19.0625C0.5 19.582 0.917969 20 1.4375 20H14.5625C15.082 20 15.5 19.582 15.5 19.0625V6.25H10.1875C9.67188 6.25 9.25 5.82812 9.25 5.3125ZM11.75 14.5312C11.75 14.7891 11.5391 15 11.2812 15H4.71875C4.46094 15 4.25 14.7891 4.25 14.5312V14.2188C4.25 13.9609 4.46094 13.75 4.71875 13.75H11.2812C11.5391 13.75 11.75 13.9609 11.75 14.2188V14.5312ZM11.75 12.0312C11.75 12.2891 11.5391 12.5 11.2812 12.5H4.71875C4.46094 12.5 4.25 12.2891 4.25 12.0312V11.7188C4.25 11.4609 4.46094 11.25 4.71875 11.25H11.2812C11.5391 11.25 11.75 11.4609 11.75 11.7188V12.0312ZM11.75 9.21875V9.53125C11.75 9.78906 11.5391 10 11.2812 10H4.71875C4.46094 10 4.25 9.78906 4.25 9.53125V9.21875C4.25 8.96094 4.46094 8.75 4.71875 8.75H11.2812C11.5391 8.75 11.75 8.96094 11.75 9.21875ZM15.5 4.76172V5H10.5V0H10.7383C10.9883 0 11.2266 0.0976562 11.4023 0.273438L15.2266 4.10156C15.4023 4.27734 15.5 4.51562 15.5 4.76172Z" fill="#CC5C5E"/>
                                    </svg>
                                    &nbsp
                                    <b>SKU Dari Desa</b>
                                </button>            
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="sku">
            </div> 
        @endif

    </div>

    <!-- USAHA -->
    <div class="container p-3 bg-white mt-5">
        <div class="row pb-2"><h3>Informasi Usaha</h3></div>
        <hr>
        @if($informasi_usaha[0] == 1)
            <div class="row pt-2"><p class="text-secondary">Nama Usaha</p></div>
            <div class="row"><p><b>{{$pengajuan->usaha->nama_usaha}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="nama_usaha">
            </div> 
        @endif
        @if($informasi_usaha[1] == 1)
            <div class="row pt-2"><p class="text-secondary">Jenis Usaha</p></div>
            <div class="row"><p><b>{{$pengajuan->usaha->jenis_usaha}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="jenis_usaha">
            </div> 
        @endif
        @if($informasi_usaha[2] == 1)
            <div class="row pt-2"><p class="text-secondary">Kegiatan Usaha</p></div>
            <div class="row"><p><b>{{$pengajuan->usaha->kegiatan_usaha}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="kegiatan_usaha">
            </div> 
        @endif
        @if($informasi_usaha[3] == 1)
            <div class="row pt-2"><p class="text-secondary">Tahun Mulai Usaha</p></div>
            <div class="row"><p><b>{{date('Y',strtotime($pengajuan->usaha->tanggal_usaha_mulai))}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="tahun_mulai">
            </div> 
        @endif
        @if($informasi_usaha[4] == 1)
            <div class="row pt-2"><p class="text-secondary">Modal Usaha</p></div>
            <div class="row"><p><b>Rp. {{$nilai_usaha->nilai_usaha->modal_usaha}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="modal_usaha">
            </div> 
        @endif
        @if($informasi_usaha[5] == 1)
            <div class="row pt-2"><p class="text-secondary">Asset</p></div>
            <div class="row"><p><b>Rp. {{$nilai_usaha->nilai_usaha->asset}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="asset">
            </div> 
        @endif
        @if($informasi_usaha[6] == 1)
            <div class="row pt-2"><p class="text-secondary">Omset</p></div>
            <div class="row"><p><b>Rp. {{$nilai_usaha->nilai_usaha->omset}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="omset">
            </div> 
        @endif
        @if($informasi_usaha[7] == 1)
            <div class="row pt-2"><p class="text-secondary">Keuntungan</p></div>
            <div class="row"><p><b>Rp. {{$nilai_usaha->nilai_usaha->keuntungan}}</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="keuntungan">
            </div> 
        @endif
        @if($informasi_usaha[8] == 1)
            <div class="row pt-2"><p class="text-secondary">Jumlah Tenaga Kerja</p></div>
            <div class="row"><p><b>{{$nilai_usaha->nilai_usaha->jumlah_tenaga_kerja}} orang</b></p></div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah_tk">
            </div> 
        @endif
        @if($informasi_usaha[9] == 1)
            <div class="row pt-2"><p class="text-secondary">Melakukan Pinjaman Dana</p></div>
            @if($pengajuan->usaha->pinjaman_dana == 0)
                <div class="row"><p><b>Sudah Pernah</b></p></div>
            @elseif($pengajuan->usaha->pinjaman_dana == 1)
                <div class="row"><p><b>Belum Pernah</b></p></div>
            @endif            
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="pinjaman_dana">
            </div> 
        @endif
        @if($informasi_usaha[10] == 1)
            <div class="row pt-2"><p class="text-secondary">Melakukan Pembinaan Usaha</p></div>
            @if($pengajuan->usaha->ikut_pembinaan_usaha == 0)
                <div class="row"><p><b>Sudah Pernah</b></p></div>
            @elseif($pengajuan->usaha->ikut_pembinaan_usaha == 1)
                <div class="row"><p><b>Belum Pernah</b></p></div>
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Penjelasan Kesalahan Data..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="pembinaan">
            </div> 
        @endif
    </div>

    <div class="row text-center mt-4">
        <div class="col"></div>
        <div class="col-2"><a href="#"><button class="btn btn-danger">Verifikasi</button></a></div>
    </div>

</div>
</form>
@endsection



<div class="modal fade" id="pasFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pas Foto Berwarna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img class="img-responsive" style="max-height:250px;" src="/images/{{$pengajuan->berkas->pas_foto_berwarna}}" alt="">
      </div>
      <div class="modal-footer">
          -
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="fotoProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img class="img-responsive" style="max-height:250px;" src="/images/{{$pengajuan->berkas->foto_produk}}" alt="">
      </div>
      <div class="modal-footer">
          -
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="sk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Surat Pernyataan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img class="img-responsive" style="max-height:600px;" width="450px" height="600px" src="/images/{{$pengajuan->berkas->surat_pernyataan}}" alt="">

    </div>
      <div class="modal-footer">
          -
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="skuDesa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SKU Dari Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img class="img-responsive" style="max-height:500px;" src="/images/{{$pengajuan->berkas->sku_dari_desa}}" alt="">
    </div>
      <div class="modal-footer">
          -
      </div>
    </div>
  </div>
</div>
