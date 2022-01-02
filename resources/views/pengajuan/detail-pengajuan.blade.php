@extends('layouts.app')

@section('content')
<form action="{{ route('kesalahan_pengajuan',$pengajuan->id_pengajuan) }}" method="GET">
   <div class="container-fluid pt-4 pb-4 mt-0">
        <div class="row">

        <!-- DATA DIRI -->
            @csrf
            <div class="col-8 bg-white">
                <div class="row mt-1 pl-3 pr-3 pt-3">
                    <div class="col ">
                        <p style="font-size:20px" class="text-start"><b>Data Diri</b></p>                    
                    </div>
                    <div class="col">
                    </div>
                </div>
                <hr class="mt-0">
                <!-- Content of Data Diri -->
                <div class="row p-3">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <p class="text-secondary">Nama Pengaju</p>
                            </div>
                            <div class="col-5">
                                <p class="text-secondary">Tanggal Pengajuan</p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col">
                                <div class="checkbox">
                                    <p><b>{{$pengajuan->data_diri->nama_pengaju}} &nbsp</b><input type="checkbox" value="1" name="nama_pengaju"></p>
                                </div>
                            </div>           
                            <?php
                                $day = date('l',strtotime($pengajuan->data_diri->tanggal_pengajuan));
                                $date = date('d F Y', strtotime($pengajuan->data_diri->tanggal_pengajuan));
                            ?>          
                            <div class="col-5">
                                <div class="checkbox">
                                    <p><b>{{$day}} , {{$date}} &nbsp</b><input type="checkbox" value="1" name="tanggal_pengajuan"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <p class="text-secondary"><b>INFORMASI KTP</b></p>
                        </div>
                        <div class="row">
                            <div class="col"><p class="text-secondary">Dusun / Jalan</p></div>
                            <div class="col"><p class="text-secondary">Desa / Kelurahan</p></div>
                            <div class="col"><p class="text-secondary">Kecamatan</p></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="checkbox">
                                    <p><b>{{$pengajuan->data_diri->dusun_jalan}}</b>&nbsp <input type="checkbox" value="1" name="dusun_jalan"></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="checkbox">
                                    <p><b>{{$pengajuan->data_diri->kelurahan_desa}}</b>&nbsp <input type="checkbox" value="1" name="kelurahan_desa"></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="checkbox">
                                    <p><b>{{$pengajuan->data_diri->kecamatan}}</b>&nbsp <input type="checkbox" value="1" name="kecamatan"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DATA DIRI -->

            <!-- BERKAS -->
            <div class="col bg-white ml-3 text-end">
                <div class="row mt-1 pl-3 pr-3 pt-3">
                    <div class="col-2">
                        <p style="font-size:20px" class="text-start"><b>Berkas</b></p>                    
                    </div>
                    <div class="col">
                    </div>
                </div>
                <hr class="mt-0">
                    <!-- SCAN KTP -->
                    <div class="row pl-3 pt-3 pr-3">
                        <div class="col-8">
                            <p class="text-start">
                                <button type="button" class="btn btn-sm btn-primary-outline text-danger" data-bs-toggle="modal" data-bs-target="#scanKTP">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.25 5.3125V0H1.4375C0.917969 0 0.5 0.417969 0.5 0.9375V19.0625C0.5 19.582 0.917969 20 1.4375 20H14.5625C15.082 20 15.5 19.582 15.5 19.0625V6.25H10.1875C9.67188 6.25 9.25 5.82812 9.25 5.3125ZM11.75 14.5312C11.75 14.7891 11.5391 15 11.2812 15H4.71875C4.46094 15 4.25 14.7891 4.25 14.5312V14.2188C4.25 13.9609 4.46094 13.75 4.71875 13.75H11.2812C11.5391 13.75 11.75 13.9609 11.75 14.2188V14.5312ZM11.75 12.0312C11.75 12.2891 11.5391 12.5 11.2812 12.5H4.71875C4.46094 12.5 4.25 12.2891 4.25 12.0312V11.7188C4.25 11.4609 4.46094 11.25 4.71875 11.25H11.2812C11.5391 11.25 11.75 11.4609 11.75 11.7188V12.0312ZM11.75 9.21875V9.53125C11.75 9.78906 11.5391 10 11.2812 10H4.71875C4.46094 10 4.25 9.78906 4.25 9.53125V9.21875C4.25 8.96094 4.46094 8.75 4.71875 8.75H11.2812C11.5391 8.75 11.75 8.96094 11.75 9.21875ZM15.5 4.76172V5H10.5V0H10.7383C10.9883 0 11.2266 0.0976562 11.4023 0.273438L15.2266 4.10156C15.4023 4.27734 15.5 4.51562 15.5 4.76172Z" fill="#CC5C5E"/>
                                    </svg>
                                    &nbsp
                                    <b>Scan File KTP</b>
                                </button>
                            </p>
                        </div>
                        <div class="col-4">
                            <p class="text-right"><input type="checkbox" class="text-right" name="scan_ktp" value="1"></p>
                        </div>  
                    </div> 

                    <!-- PAS FOTO -->
                    <div class="row pl-3 pr-3">
                        <div class="col-8">
                            <p class="text-start">
                                <button type="button" class="btn btn-sm btn-primary-outline text-danger" data-bs-toggle="modal" data-bs-target="#pasFoto">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 4.76332V5H10.5V0H10.7367C10.9853 1.29998e-06 11.2238 0.0987666 11.3996 0.27457L15.2254 4.10039C15.4012 4.27621 15.5 4.51467 15.5 4.76332ZM10.1875 6.25C9.67188 6.25 9.25 5.82812 9.25 5.3125V0H1.4375C0.919727 0 0.5 0.419727 0.5 0.9375V19.0625C0.5 19.5803 0.919727 20 1.4375 20H14.5625C15.0803 20 15.5 19.5803 15.5 19.0625V6.25H10.1875ZM4.89629 6.875C5.93184 6.875 6.77129 7.71445 6.77129 8.75C6.77129 9.78555 5.93184 10.625 4.89629 10.625C3.86074 10.625 3.02129 9.78555 3.02129 8.75C3.02129 7.71445 3.86078 6.875 4.89629 6.875ZM13.0213 16.25H3.02129L3.04023 14.3561L4.58379 12.8125C4.76684 12.6295 5.04469 12.6484 5.22773 12.8314L6.77129 14.375L10.8148 10.3314C10.9979 10.1484 11.2947 10.1484 11.4778 10.3314L13.0213 11.875V16.25Z" fill="#CC5C5E"/>
                                    </svg>
                                    &nbsp
                                    <b>Pas Foto Berwarna</b>
                                </button>
                            </p>
                        </div>
                        <div class="col-4">
                            <p class="text-right"><input type="checkbox" class="text-right" name="pas_foto" value="1"></p>
                        </div>  
                    </div>

                    <!-- FOTO PRODUK -->
                    <div class="row pl-3 pr-3">
                        <div class="col-8">
                            <p class="text-start">
                                <button type="button" class="btn btn-sm btn-primary-outline text-danger" data-bs-toggle="modal" data-bs-target="#fotoProduk">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 4.76332V5H10.5V0H10.7367C10.9853 1.29998e-06 11.2238 0.0987666 11.3996 0.27457L15.2254 4.10039C15.4012 4.27621 15.5 4.51467 15.5 4.76332ZM10.1875 6.25C9.67188 6.25 9.25 5.82812 9.25 5.3125V0H1.4375C0.919727 0 0.5 0.419727 0.5 0.9375V19.0625C0.5 19.5803 0.919727 20 1.4375 20H14.5625C15.0803 20 15.5 19.5803 15.5 19.0625V6.25H10.1875ZM4.89629 6.875C5.93184 6.875 6.77129 7.71445 6.77129 8.75C6.77129 9.78555 5.93184 10.625 4.89629 10.625C3.86074 10.625 3.02129 9.78555 3.02129 8.75C3.02129 7.71445 3.86078 6.875 4.89629 6.875ZM13.0213 16.25H3.02129L3.04023 14.3561L4.58379 12.8125C4.76684 12.6295 5.04469 12.6484 5.22773 12.8314L6.77129 14.375L10.8148 10.3314C10.9979 10.1484 11.2947 10.1484 11.4778 10.3314L13.0213 11.875V16.25Z" fill="#CC5C5E"/>
                                    </svg>
                                    &nbsp
                                    <b>Foto Produk</b>
                                </button>
                            </p>
                        </div>
                        <div class="col-4">
                            <p class="text-right"><input type="checkbox" class="text-right" name="foto_produk" value="1"></p>
                        </div>  
                    </div>

                    <!-- SURAT PERNYATAAN -->
                    <div class="row pl-3 pr-3">
                        <div class="col-8">
                            <p class="text-start">
                                <button type="button" class="btn btn-sm btn-primary-outline text-danger" data-bs-toggle="modal" data-bs-target="#sk">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.25 5.3125V0H1.4375C0.917969 0 0.5 0.417969 0.5 0.9375V19.0625C0.5 19.582 0.917969 20 1.4375 20H14.5625C15.082 20 15.5 19.582 15.5 19.0625V6.25H10.1875C9.67188 6.25 9.25 5.82812 9.25 5.3125ZM11.75 14.5312C11.75 14.7891 11.5391 15 11.2812 15H4.71875C4.46094 15 4.25 14.7891 4.25 14.5312V14.2188C4.25 13.9609 4.46094 13.75 4.71875 13.75H11.2812C11.5391 13.75 11.75 13.9609 11.75 14.2188V14.5312ZM11.75 12.0312C11.75 12.2891 11.5391 12.5 11.2812 12.5H4.71875C4.46094 12.5 4.25 12.2891 4.25 12.0312V11.7188C4.25 11.4609 4.46094 11.25 4.71875 11.25H11.2812C11.5391 11.25 11.75 11.4609 11.75 11.7188V12.0312ZM11.75 9.21875V9.53125C11.75 9.78906 11.5391 10 11.2812 10H4.71875C4.46094 10 4.25 9.78906 4.25 9.53125V9.21875C4.25 8.96094 4.46094 8.75 4.71875 8.75H11.2812C11.5391 8.75 11.75 8.96094 11.75 9.21875ZM15.5 4.76172V5H10.5V0H10.7383C10.9883 0 11.2266 0.0976562 11.4023 0.273438L15.2266 4.10156C15.4023 4.27734 15.5 4.51562 15.5 4.76172Z" fill="#CC5C5E"/>
                                    </svg>
                                    &nbsp
                                    <b>Surat Pernyataan</b>
                                </button>
                            </p>
                        </div>
                        <div class="col-4">
                            <p class="text-right"><input type="checkbox" class="text-right" name="surat_pernyataan" value="1"></p>
                        </div>  
                    </div>

                    <!-- SKU Dari DESA -->
                    <div class="row pl-3 pr-3">
                        <div class="col-8">
                            <p class="text-start">
                                <button type="button" class="btn btn-sm btn-primary-outline text-danger" data-bs-toggle="modal" data-bs-target="#skuDesa">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.25 5.3125V0H1.4375C0.917969 0 0.5 0.417969 0.5 0.9375V19.0625C0.5 19.582 0.917969 20 1.4375 20H14.5625C15.082 20 15.5 19.582 15.5 19.0625V6.25H10.1875C9.67188 6.25 9.25 5.82812 9.25 5.3125ZM11.75 14.5312C11.75 14.7891 11.5391 15 11.2812 15H4.71875C4.46094 15 4.25 14.7891 4.25 14.5312V14.2188C4.25 13.9609 4.46094 13.75 4.71875 13.75H11.2812C11.5391 13.75 11.75 13.9609 11.75 14.2188V14.5312ZM11.75 12.0312C11.75 12.2891 11.5391 12.5 11.2812 12.5H4.71875C4.46094 12.5 4.25 12.2891 4.25 12.0312V11.7188C4.25 11.4609 4.46094 11.25 4.71875 11.25H11.2812C11.5391 11.25 11.75 11.4609 11.75 11.7188V12.0312ZM11.75 9.21875V9.53125C11.75 9.78906 11.5391 10 11.2812 10H4.71875C4.46094 10 4.25 9.78906 4.25 9.53125V9.21875C4.25 8.96094 4.46094 8.75 4.71875 8.75H11.2812C11.5391 8.75 11.75 8.96094 11.75 9.21875ZM15.5 4.76172V5H10.5V0H10.7383C10.9883 0 11.2266 0.0976562 11.4023 0.273438L15.2266 4.10156C15.4023 4.27734 15.5 4.51562 15.5 4.76172Z" fill="#CC5C5E"/>
                                    </svg>
                                    &nbsp
                                    <b>SKU Dari Desa</b>
                                </button>
                            </p>
                        </div>
                        <div class="col-4">
                            <p class="text-right"><input type="checkbox" class="text-right" name="sku" value="1"></p>
                        </div>  
                    </div>
                </div>
        </div>

        <div class="row mt-5 bg-white">
            <div class="col ml-3 text-end">
                <div class="row mt-1 pr-3 pt-3">
                    <div class="col">
                        <p style="font-size:20px" class="text-start"><b>Informasi Usaha</b></p>                    
                    </div>
                    <div class="col">
                    </div>
                </div>
                <hr class="mt-0">

                <div class="row text-start pt-2">
                    <div class="col"><p class="text-secondary">Nama Usaha</p></div>
                    <div class="col"><p class="text-secondary">Jenis Usaha</p></div>
                    <div class="col"><p class="text-secondary">Kegiatan Usaha</p></div>
                    <div class="col"><p class="text-secondary">Tahun Mulai Usaha</p></div>
                </div>
                <div class="row text-start mt-0">
                    <div class="col">
                        <div class="checkbox">
                            <p><b>{{$pengajuan->usaha->nama_usaha}}</b>&nbsp <input type="checkbox" value="1" name="nama_usaha"></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="checkbox">
                            <p><b>{{$pengajuan->usaha->jenis_usaha}}</b>&nbsp <input type="checkbox" value="1" name="jenis_usaha"></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="checkbox">
                            <p><b>{{$pengajuan->usaha->kegiatan_usaha}}</b>&nbsp <input type="checkbox" value="1" name="kegiatan_usaha"></p>
                        </div>
                    </div>
                    <?php
                        $year = date('Y',strtotime($pengajuan->usaha->tanggal_usaha_mulai));
                    ?>
                    <div class="col">
                        <div class="checkbox">
                            <p><b>{{$year}}</b>&nbsp <input type="checkbox" value="1" name="tahun_mulai"></p>
                        </div>
                    </div>
                </div>

                <div class="row text-start text-secondary pt-3"><p><b>NILAI USAHA</b></p></div>
                <div class="row text-start">
                    <div class="col"><p class="text-secondary">Modal Usaha</p></div>
                    <div class="col"><p class="text-secondary">Aset</p></div>
                    <div class="col"><p class="text-secondary">Omset</p></div>
                    <div class="col"><p class="text-secondary">Keuntungan</p></div>
                    <div class="col"><p class="text-secondary">Jumlah Tenaga Kerja</p></div>
                </div>
                <div class="row text-start">
                    <div class="col">
                        <div class="checkbox">
                            <p><b>Rp{{$usaha->nilai_usaha->modal_usaha}}</b>&nbsp <input type="checkbox" value="1" name="modal_usaha"></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="checkbox">
                            <p><b>Rp.{{$usaha->nilai_usaha->asset}}</b>&nbsp <input type="checkbox" value="1" name="asset"></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="checkbox">
                            <p><b>Rp{{$usaha->nilai_usaha->omset}}</b>&nbsp <input type="checkbox" value="1" name="omset"></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="checkbox">
                            <p><b>Rp{{$usaha->nilai_usaha->keuntungan}}</b>&nbsp <input type="checkbox" value="1" name="keuntungan"></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="checkbox">
                            <p><b>{{$usaha->nilai_usaha->jumlah_tenaga_kerja}} Orang</b>&nbsp <input type="checkbox" value="1" name="jumlah_tk"></p>
                        </div>
                    </div>
                </div>
                <div class="row text-start text-secondary pt-3"><p><b>PENINGKATAN USAHA</b></p></div>
                <div class="row text-start">
                    <div class="col-3"><p class="text-secondary">Melakukan Pinjaman Dana</p></div>
                    <div class="col-3"><p class="text-secondary">Melakukan Pembinaan Usaha</p></div>
                </div>
                <?php
                    if($pengajuan->usaha->pinjaman_dana == 0){
                        $pd = "Sudah Pernah";
                    }else if($pengajuan->usaha->pinjaman_dana == 1){
                        $pd = "Belum Pernah";
                    }

                    if($pengajuan->usaha->ikut_pembinaan_usaha == 0){
                        $ipu = "Sudah Pernah";
                    }else if($pengajuan->usaha->ikut_pembinaan_usaha == 1){
                        $ipu = "Belum Pernah";
                    }
                ?>
                <div class="row text-start">
                    <div class="col-3">
                        <div class="checkbox">
                            <p><b>{{$pd}}</b>&nbsp <input type="checkbox" value="1" name="pinjaman_dana"></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="checkbox">
                            <p><b>{{$ipu}}</b>&nbsp <input type="checkbox" value="1" name="ikut_pembinaan"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row text-right mt-5">
                <div class="col"></div>
                <div class="col-3">
                    <button type="submit" class="btn btn-danger" >Verifikasi</button>
                </div>
            </div>

        </div>        
    </div>                
</form>


@endsection



<div class="modal fade" id="scanKTP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Scan KTP</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
        <img class="img-responsive" style="max-height:250px;"src="{{$pengajuan->berkas->scan_ktp}}" alt="">   
        </div>
      <div class="modal-footer">
          -
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pasFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pas Foto Berwarna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img class="img-responsive" style="max-height:250px;" src="{{$pengajuan->berkas->pas_foto_berwarna}}" alt="">
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
        <img class="img-responsive" style="max-height:250px;" src="{{$pengajuan->berkas->foto_produk}}" alt="">
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
      <img class="img-responsive" style="max-height:600px;" width="450px" height="600px" src="{{$pengajuan->berkas->surat_pernyataan}}" alt="">

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
        <img class="img-responsive" style="max-height:500px;" src="{{$pengajuan->berkas->sku_dari_desa}}" alt="">
    </div>
      <div class="modal-footer">
          -
      </div>
    </div>
  </div>
</div>


<script src="/js/pdfobject.js"></script>
<script>PDFObject.embed("/dist/img/file.pdf", "#example1");</script>
<script src="https://github.com/pipwerks/PDFObject/blob/master/pdfobject.min.js"></script>
