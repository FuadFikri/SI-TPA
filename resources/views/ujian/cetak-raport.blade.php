<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Rapor</title>
<link rel="stylesheet" href="{{asset('css\bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        {{-- header --}}
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Taman Pendidikan Al-Qur'an Al-Kariim</h2>
                <h3 class="text-center">Masjid Al-Kariim Pogung Lor</h3>
                <h5 class="text-center">Pogung Lor RT 06 RW 46 Sinduadi, Mlati, Sleman 55284</h5>
            </div>
        </div>
        {{-- end header --}}

        {{-- garis --}}
        <div class="row" style="background-color:grey;">
            -
        </div>
        {{-- end garis --}}

        <div class="row">
            <div class="col-12">
                <table border="1">
                    <tr>
                        <td>a</td>
                        <td>b</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>Fuad Fikri</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>1998-24-11</td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>Wusto</td>
                    </tr>
                    <tr>
                        <td>Wali</td>
                        <td>Bapaku</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>Pogung Lor RT, RW, </td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>

<script src="{{asset('js\bootstrap.min.js')}}"></script>
</body>
</html>