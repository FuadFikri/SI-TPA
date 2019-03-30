@extends('layouts.global')

@section('content')
@foreach ($daftar_ujian as $ujian)
<div class="col-md-6 col-lg-12 col-12 mb-2 col-sm-9">
    @if ($ujian->status==0)
        <a disabled>
    @else
        <a href="{{route('pilih-santri',['ujian_id'=> $ujian->id])}}">
    @endif
            <div
                class="media shadow-sm p-0 bg-{{$ujian->status==1? 'primary' : 'primary-lightest'}} rounded text-light">
                <span
                    class="oi top-0 rounded-left oi-task h-100 bg-{{$ujian->status==1? 'primary' : 'primary-lightest'}} text-light p-4 fs-5"></span>
                <div class="media-body p-2">
                    <h6 class="media-title m-0">Ujian TPA AL-Kariim Pogung Lor tahun {{$ujian->tahun}}</h6>
                    <div class="media-text">
                        <h3>Semester {{$ujian->semester}}</h3>
                        <h5>{{$ujian->keterangan}}</h5>
                    </div>
                </div>
            </div>
        </a>
</div>
@endforeach

@endsection
