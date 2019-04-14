@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-white pb-1">
                    <h5 class="">Data Detail Ujian</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <ul>
                        <li>Semester <b>{{$ujian->semester}}</b></li>
                        <li>tahun <b>{{$ujian->tahun}}</b></li>
                        <li>keterangan<ul><b> {{$ujian->keterangan}}</b></ul></li>
                        <li>status <b>{{$ujian->status==1?'aktif' :'tidak aktif'}}</b></li>
                        <li>
                            Materi
                            @foreach ($ujian->materis as $item)
                            <ul>   <li><a href="{{url('lihat-nilai?materi='.$item->id)}}"><b>
                                        {{ $item->judul}}
                                    </b></a></li>
                            </ul>
                            @endforeach
                        </li>    
                        
                    </ul>
                </div>
                <a href="{{url('ujian/cetak-raport')}}" class="btn btn-info">Cetak Rapor</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
