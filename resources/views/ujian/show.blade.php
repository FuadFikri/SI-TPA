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
                        <ul>
                        <li>Semester <b>{{$ujian->semester}}</b></li>
                        <li>tahun <b>{{$ujian->tahun}}</b></li>
                        <li>keterangan<b> {{$ujian->keterangan}}</b></li>
                        <li>status <b>{{$ujian->status==1?'aktif' :'tidak aktif'}}</b></li>
                        <li>
                            Materi
                            @foreach ($ujian->materis as $item)
                            <ul>   <li><b>{{ $item->judul}}</b></li></ul>
                            @endforeach
                        </li>    
                       
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
