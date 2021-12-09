<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Notify</title>
    <style>
        body {
            background-color:#bdc3c7;
            margin:0;
        }
        .card {
            background-color:#fff;
            padding:20px;
            margin:20%;
            text-align:center;
            margin:0px auto;
            width: 580px;
            max-width: 580px;
            margin-top:10%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        .garis {
            width: 75%;
        }
        
    </style>
</head>
<body>
    <div class="card">
        <h3>Halo {{$konsultasi->nama_pengaju}}</h3>
        <hr class="garis">
        <p><b>Anda Tidak Hadir pada Sesi Konsultasi Usaha</b></p>
        <p>Hari/tanggal : {{$day}} / {{$date}}</p>
        <p>Sesi, Jam : {{$konsultasi->sesi_konsultasi}} WIB</p>   
        <p style="color: #ff0000">Oleh karena itu, anda tidak bisa mendaftarkan konsultasi, terhitung dari hari ini sampai <b>{{$day}}, {{$date_next}}</b></p>
    </div>
</body>
</html>