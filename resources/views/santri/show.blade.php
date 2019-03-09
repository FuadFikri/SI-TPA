@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-white pb-1">
                    <h5 class="">Data Detail</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if ($santri->url_foto)
                            <img src="{{asset('storage/'.$santri->url_foto)}}" class="w-50 mb-2">
                        @endif
                    </div>
                    <div class="row">
                        <h4>{{$santri->nama_lengkap}}</h4>
                    </div>
                    <div class="row">

                        <ul>
                            <li>nama panggilan : <b>{{$santri->nama_panggilan}}</b></li>
                            <li>tanggal lahir: <b>{{$santri->tgl_lahir}}</b> </li>
                            <li>{{$santri->jenis_kelamin}} </li>
                            <li>RT/RW : <b>{{$santri->RT}}/{{$santri->RW}}</b> </li>
                            <li>no. rumah : <b>{{$santri->no_rumah}}</b> </li>
                            <li>sekolah di : <b>{{$santri->sekolah->nama}}</b> </li>
                            <li>masuk TPA tahun : <b>{{$santri->tahun_masuk_tpa}}</b> </li>
                            <li>nama orang tua : <b>{{$santri->nama_orang_tua}}</b> </li>
                            <li>di TPA kelas : <b>{{$santri->kelas->nama}}</b> </li>
                            <li>Masih aktif ? : <b> {{ $santri->isActive()? "aktif" : "tidak"}} </b> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
