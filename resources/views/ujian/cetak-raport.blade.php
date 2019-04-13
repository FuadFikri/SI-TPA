<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Rapor</title>
    <link rel="stylesheet" href="{{asset('css\bootstrap.min.css')}}">
</head>

@for ($i = 0; $i < $santris->count(); $i++)
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
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama</td>
                            <td>{{$santris[$i]->nama_lengkap}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>{{ Carbon\Carbon::parse($santris[$i]->tgl_lahir)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>{{$santris[$i]->kelas? $santris[$i]->kelas->nama : ''}}</td>
                        </tr>
                        <tr>
                            <td>Wali</td>
                            <td>{{$santris[$i]->nama_orang_tua}}</td>
                        </tr>
                        <tr>
                            <td>RT</td>
                            <td>{{$santris[$i]->RT==15?'luar pogung':$santris[$i]->RT}}</td>
                        </tr>

                    </table>
                </div>
            </div>
            
               
                    @foreach ($results as $item)
                    @if ($item->id==$santris[$i]->id)
                    <div class="row">
                    <table>
                            <tr>
                                <td colspan="2" class="text-center">{{$item->judul}}</td>
                            </tr>
                            <tr>
                                <td width="200px">Parameter Kelulusan</td>
                                <td> {{$item->parameter_kelulusan}}</td>
                                
                            </tr>
                                      <tr>
                                <td>Nilai</td>
                                <td>{{$item->nilai}}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td> {{$item->deskripsi}}</td>
                            </tr>
                            <tr>
                                <td>Penguji</td>
                                <td>{{$item->penguji}}</td>
                            </tr>
                        </table>
                    </div>
                    
                    @endif
                    @endforeach
            

        </div>
        <div style="height:450px;"></div>
        <script src="{{asset('js\bootstrap.min.js')}}"></script>
    </body>
    @endfor

</html>
