
  <html>
      <head>

      </head>
      <body>
        <div style="padding:10px; border:5px solid #686868 ; height:950px">
            <div style="border: 2px solid #686868 ; padding:15px ; height:915px">
                <div style="text-align:center;">
                    <span style="font-size:27px; font-weight:bold;">PEMERINTAH KABUPATEN JEMBER</span>
                    <p><span style="font-size:20px; font-weight:bold">DINAS KOPERASI DAN USAHA MIKRO</span></p>
                    <p><b>Jl.Karimata No.115 Telp/Fax.(0331) 336101 JEMBER - 68121</b></p>
                    <p style="margin-top:-13px"><b>Web Site : www.umkm-jember.net</b></p>
                </div>
                    <hr>
                <div style="text-align:center">
                    <h5 style="font-size:20px;margin-bottom:-15px">SURAT KETERANGAN USAHA (SKU)</h5>
                    <h5 style="font-size:15px">Nomor : 212 / 2323 / 324 / 7565</h5>
                </div>
                <p>Berdasarkan Peraturan Bupati Jember No.43 Tahun 2016 Tanggal 01 Desember 2016 tentang Kedudukan, Susunan Organisasi , Tugas dan Fungsi serta tata Kerja Dinas Koperasi dan Usaha Mikro Kabupaten Jember bersama ini menerangkan : </p>
                <p style="padding-top:20px">Nama Usaha : {{$show->usaha->nama_usaha}}</p>
                <p style="margin-top:-10px; a">Nama Penanggung Jawab : {{$show->data_diri->nama_pengaju}}</p>
                <p style="margin-top:-10px">Alamat</p>
                <ul style="margin-top:-10px">
                    <li>Dusun/Jalan : {{$show->data_diri->dusun_jalan}}</li>
                    <li>Kelurahan/Desa : {{$show->data_diri->kelurahan_desa}}</li>
                    <li>Kecamatan : {{$show->data_diri->kecamatan}}</li>
                    <li>Kabupaten : Jember</li>
                </ul>
                <p style="margin-top:-10px">Nomor Telepon : {{$show->data_diri->no_telp}}</p>
                <p style="margin-top:-10px">Jenis Usaha : {{$show->usaha->jenis_usaha}}</p>
                <p style="margin-top:-10px">Nilai Aset : Rp. {{$nilai_usaha->asset}}</p>
                <p style="margin-top:-10px">Omset Penjualan/Bulan : Rp. {{$nilai_usaha->omset}}</p>
                <p style="margin-top:-10px">Kegiatan Usaha Yang Dijalankan : {{$show->usaha->kegiatan_usaha}}</p>
                <p style="padding-top:20px">Surat Keteragan Usaha ini berlaku untuk kegiatan usaha Mikro dis eluruh wilayah Kabupaten Jember dan selama pengusaha masih menjalankan usahanya wajib didaftar ulang 5 tahun sekali . </p>

                <div style="float:right ;">
                    <p>Jember , {{date('d F Y', strtotime(date("Y-m-d")))}}</p>
                    <p style="margin-top:-15px"> A.n Bupati Jember</p>
                    <p style="margin-top:-15px">Plt.Kepala Dinas Koperasi dan Usaha Mikro</p>
                    <p style="margin-top:-15px">Kabupaten Jember</p>
                    <p style="padding-top:20px"><u>Drs.MOH.DJAMIL.,M.,Si</u></p>
                    <p style="margin-top:-15px">Pembina Tingakt 1</p>
                    <p style="margin-top:-15px">NIP . 73427293 43234432 3342</p>
                </div>
            </div>
        </div>
        
     
             
      </body>
  </html>

<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>