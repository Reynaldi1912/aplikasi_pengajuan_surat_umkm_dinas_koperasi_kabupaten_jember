<div class="pt-5">
    @if(!empty($successMessage))
    <div class="alert alert-success">
        {{ $successMessage }}
    </div>
    @endif
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link {{ $currentStep != 1 ? '' : 'active btn-danger' }}" href="#step1">Step 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStep != 2 ? '' : 'active btn-danger' }}" href="#step2">Step 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStep != 3 ? '' : 'active btn-danger' }}" href="#step3">Step 3</a>
        </li>
    </ul>
    <div class="row pt-3">
        {{-- Step 1 --}}
        <div id="step1" class="needs-validation row" style="display: {{ $currentStep != 1 ? 'none' : '' }}">
                <div class="col"></div>
                <div class="col-10">
                    <div class="mb-3 mt-5 container">
                        <p>Nama Lengkap</p>
                        <input placeholder="Masukan Nama Anda" type="text" wire:model="nama_lengkap" class="form-control {{$errors->first('nama_lengkap') ? "is-invalid" : "" }}" id="nama_lengkap" aria-describedby="nama_lengkap">
                        <input type="hidden" value="{{Auth::user()->id}}" wire:model="users_id" class="form-control {{$errors->first('users_id') ? "is-invalid" : "" }}" id="users_id" aria-describedby="users_id">

                        @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col"></div>
            <div class="mt-5 container row">
                <div class="col"></div>
                <div class="col-10">
                    <h4 class="text-secondary">&ensp;<b>INFORMASI KTP</b></h4>
                    <p class="text-secondary">&ensp; Masukan Informasi domisili sesuai dengan informasi yang ada di KTP Anda.</p>
                </div>
                <div class="col"></div>
            </div>
            <div class="row justify-content-md-center">
            <div class="col"></div>
                <div class="col-5">
                    <div class="mb-3">
                        <p>Nama Dusun / Jalan</p>
                        <input placeholder="Masukan Nama Dusun / Jalan" type="text" wire:model="nama_dusun" class="form-control {{$errors->first('nama_dusun') ? "is-invalid" : "" }}" id="nama_dusun">
                        @error('nama_dusun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-5">
                    <div class="mb-3">
                        <p>Nama Kelurahan / Desa</p>
                        <input placeholder="Masukan Nama Desa / Kelurahan" type="text" wire:model="nama_kelurahan" class="form-control {{$errors->first('nama_kelurahan') ? "is-invalid" : "" }}" id="nama_kelurahan" aria-describedby="nama_kelurahan">
                        @error('nama_kelurahan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col"></div>
            </div>
           
            <div class="mb-3 row">
                <div class="col"></div>
                <div class="col-10">
                    <p>Kecamatan</p>
                    <input placeholder="Masukan Nama Kecamatan" type="text" wire:model="nama_kecamatan" class="form-control {{$errors->first('nama_kecamatan') ? "is-invalid" : "" }}" id="nama_kecamatan">
                    @error('nama_kecamatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>  
                <div class="col"></div>

            </div>
            <div class="mb-3 row">
                <div class="col"></div>
                <div class="col-10">
                    <p>Nomor Telepon</p>
                    <input placeholder="Masukkan Nomor Telepon" type="text" wire:model="telp" class="form-control {{$errors->first('telp') ? "is-invalid" : "" }}" id="telp">
                    @error('telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>  
                <div class="col"></div>

            <div class="mb-3 mt-3 row">
                <div class="col"></div>
                <div class="col-10">
                    <p>NIK</p>
                    <input placeholder="Masukkan NIK" type="text" wire:model="nik" class="form-control {{$errors->first('nik') ? "is-invalid" : "" }}" id="nik">
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>  
                <div class="col"></div>

            </div>
           
            <div class="row pt-4">
                <div class="col text-end"> <button class="btn btn-danger" wire:click="firstStepSubmit" type="submit"
                type="button">Berikutnya</button></div>
            </div>
        </div>
    </div>

        {{-- Step 2 --}}
        <div id="step2" style="display: {{ $currentStep != 2 ? 'none' : '' }}">
            <div class="mb-3 container row pt-5">
                <div class="col"></div>
                <div class="col-10">
                    <label for="nama_usaha" class="form-label">Nama Usaha</label>
                    <input type="text" wire:model="nama_usaha" class="form-control {{$errors->first('nama_usaha') ? "is-invalid" : "" }}" id="nama_usaha" aria-describedby="nama_usaha">
                    @error('nama_usaha')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col"></div>
            </div>
            <div class="row container">
                <div class="col"></div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                        <select class="form-select" wire:model="jenis_usaha" class="form-control {{$errors->first('jenis_usaha') ? "is-invalid" : "" }}" id="jenis_usaha" aria-describedby="jenis_usaha">
                            <option selected>Pilih Jenis Usaha</option>    
                            <option value="Produksi">Produksi</option>
                            <option value="Perdagangan">Perdagangan</option>
                            <option value="Jasa Pertanian">Jasa Pertanian</option>
                            <option value="Peternakan">Peternakan</option>
                        </select>
                        @error('jenis_usaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="kegiatan_usaha" class="form-label">Kegiatan Usaha</label>
                        <input type="text" wire:model="kegiatan_usaha" class="form-control {{$errors->first('kegiatan_usaha') ? "is-invalid" : "" }}" id="kegiatan_usaha" aria-describedby="kegiatan_usaha">
                        @error('kegiatan_usaha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-3">
                        <label for="tahun_mulai" class="form-label">Tanggal Usaha Mulai</label>
                        <input type="date" wire:model="tahun_mulai" class="form-control {{$errors->first('tahun_mulai') ? "is-invalid" : "" }}" id="tahun_mulai" aria-describedby="tahun_mulai">
                        @error('tahun_mulai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col"></div>
            </div>

            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-10">
                    <h3 class="text-secondary"><b>NILAI USAHA</b></h3>
                    <p class="text-secondary">Masukan Informasi nilai usaha anda dalam bentuk rupiah</p>
                </div>
                <div class="col"></div>
            </div>
            
            <div class="mb-3 row">
                <div class="col"></div>
                <div class="col-10">
                    <label for="modal" class="form-label">Modal</label>
                    <input type="number" wire:model="modal" class="form-control {{$errors->first('modal') ? "is-invalid" : "" }}" id="modal">
                    @error('modal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col"></div>
            </div>

            <div class="mb-3 row">
                <div class="col"></div>
                <div class="col-5">
                    <label for="asset" class="form-label">Aset</label>
                        <input type="number" wire:model="asset" class="form-control {{$errors->first('asset') ? "is-invalid" : "" }}" id="asset">
                        @error('asset')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="col-5">
                    <label for="omset" class="form-label">Omset</label>
                        <input type="number" wire:model="omset" class="form-control {{$errors->first('omset') ? "is-invalid" : "" }}" id="omset">
                        @error('omset')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="col"></div>
            </div>
           
            <div class="mb-3 row">
                <div class="col"></div>
                <div class="col-5">
                    <label for="keuntungan" class="form-label">Keuntungan</label>
                        <input type="number" wire:model="keuntungan" class="form-control {{$errors->first('keuntungan') ? "is-invalid" : "" }}" id="keuntungan">
                        @error('keuntungan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="col-5">
                    <label for="jumlah_tk" class="form-label">Jumlah Tenaga Kerja</label>
                    <input type="number" wire:model="jumlah_tk" class="form-control {{$errors->first('jumlah_tk') ? "is-invalid" : "" }}" id="jumlah_tk">
                    @error('jumlah_tk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col"></div>
            </div>
            <div class="mb-3 row">
                <div class="col"></div>
                <div class="col-10">
                    <label for="pinjaman_dana" class="form-label">Apakah Anda Pernah melakukan pinjaman dana usaha ?</label><br>
                    <label class="radio-inline me-2"><input type="radio" wire:model="pinjaman_dana" class="me-2" value="0"
                        {{{ $pinjaman_dana == 0 ? "checked" : "" }}}>Iya</label>
                    <label class="radio-inline"><input type="radio" wire:model="pinjaman_dana" class="me-2" value="1"
                            {{{ $pinjaman_dana == 1 ? "checked" : "" }}}>Tidak</label>
                    @error('status') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col"></div>
               
            </div>
            <div class="mb-3 row">
            <div class="col"></div>
                <div class="col-10">
                    <label for="ikut_pembinaan" class="form-label">Apakah Anda Pernha Mengikuti Pembinaan Usaha ?</label><br>
                    <label class="radio-inline me-2"><input type="radio" wire:model="ikut_pembinaan" class="me-2" value="0"
                        {{{ $ikut_pembinaan == 0 ? "checked" : "" }}}>Iya</label>
                    <label class="radio-inline"><input type="radio" wire:model="ikut_pembinaan" class="me-2" value="1"
                            {{{ $ikut_pembinaan == 1 ? "checked" : "" }}}>Tidak</label>
                    @error('status') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col"></div>
            </div>
            
            <button class="btn btn-danger" type="button" wire:click="back(1)">Sebelumnya</button>
            <button class="btn btn-primary" type="button" wire:click="secondStepSubmit">Selanjutnya</button>
        </div>

        {{-- Step 3 --}}

        
        <div id="step3" style="display: {{ $currentStep != 3 ? 'none' : '' }}">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{route('pengajuan.store')}}" method="post" enctype="multipart/form-data">
        @csrf
       
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputName">Scan KTP</label>
                    <input type="file" class="form-control" id="exampleInputName" wire:model="scan_ktp" name="scan_ktp">
                    @error('scan_ktp') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputName">Pas Foto</label>
                    <input type="file" class="form-control" id="exampleInputName" wire:model="pas_foto" name="pas_foto">
                    @error('pas_foto') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <div class="form-group">
                        <label for="exampleInputName">Foto Produk</label>
                        <input type="file" class="form-control" id="exampleInputName" wire:model="foto_produk" name="foto_produk">
                        @error('foto_produk') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputName">Surat Pernyataan</label>
                    <input type="file" class="form-control" id="exampleInputName" wire:model="surat_pernyataan" name="surat_pernyataan">
                    @error('surat_pernyataan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputName">SKU Dari Desa</label>
                    <input type="file" class="form-control" id="exampleInputName" wire:model="sku" name="sku">
                    @error('sku') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col"></div>
        </div>


            <button class="btn btn-danger" type="button" wire:click="back(2)">Back</button>
            <button class="btn btn-success" wire:click="submitForm" type="submit">Finish</button>

        </form>

        </div>
    </div>
</div>


