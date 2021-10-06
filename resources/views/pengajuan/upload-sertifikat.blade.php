@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Drag & Drop File Uploading using Laravel 8 Dropzone JS - Tutsmake.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>
  
<div class="container mt-2">
<div class="container bg-white pt-4 pb-4">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <h3><i class="fa fa-check-circle"></i> &nbsp;Upload Success</h3>
        <p>&emsp;&ensp; Upload Seritifikat Telah Berhasil</p>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">  
            <form action="{{ route('dropzone.store',$berkas->id_berkas) }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                @csrf
                <div>
                </div>
            </form>
        </div>
    </div>

    <div class="row pt-5">
        <div class="col"></div>
        <div class="col-2"><a href="{{route('list-pengajuan-sertifikat')}}"><button class="btn btn-sm btn-primary-outline text-danger">Selesai</button></a></div>
        <div class="col-2"></div>
    </div>
</div>
  
<script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize         :       5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf"
        };
</script>
  
</body>
</html>
@endsection
