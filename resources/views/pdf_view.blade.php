<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-image: url('https://sobat.sgp1.cdn.digitaloceanspaces.com/Screenshot%202023-05-24%20at%2020.09.53.png');
        background-repeat: no-repeat;
        margin-left:20px;
        font-size: 14px;
    },
    .absolute-text{
        margin-top : 264px;
        margin-left: 250px;
    }
    .margin-top{
        margin-top: 3px;
    }
</style>
<body>
    <div>
        <div class="absolute-text">
            <div>
                {{ $pendaftar->nama }}
            </div>
            <div class="margin-top">
                {{ $pendaftar->nomor_daftar }}
            </div>
            <div class="margin-top">
                {{ $pendaftar->asal_sekolah }}
            </div>
            <div style="margin-top:1px;">
                {{ $pendaftar->persyaratan }}
            </div>
            <div style="margin-top:19px;">
                {{ $pendaftar->jurusan->name }}
            </div>
        </div>
    </div>
</body>
</html>