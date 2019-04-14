@extends('layouts.global')

@section('content')

<div class="col-lg-4 col-md-6 mb-2 col-sm-6">
    <div class="card border-0 shadow-sm bg-danger text-light">
        <div class="card-body">
            <div class="media">
                <div class="media-body">
                    <h2 class="fw-bold">{{$jumlah_santri}}</h2>
                    <h6>Data Santri</h6>
                </div>
                <span class="oi oi-people p-2 fs-9 text-danger-lighter"></span>
            </div>
        </div>
        <div class="card-footer border-0 text-center p-1 bg-danger-lighter">
            <a href="{{route('santri.index')}}" class="text-light">
                More info <span class="oi oi-arrow-circle-right"></span>
            </a>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 mb-2 col-sm-6">
    <div class="card border-0 shadow-sm bg-secondary text-dark">
        <div class="card-body">
            <div class="media">
                <div class="media-body">
                <h2 class="fw-bold">{{$jumlah_kelas}}</h2>
                    <h6>Data Kelas</h6>
                </div>
                <span class="oi oi-bar-chart p-2 fs-9 text-dark-lighter"></span>
            </div>
        </div>
        <div class="card-footer border-0 text-center p-1 bg-dark-lighter">
            <a href="{{route('kelas.index')}}" class="text-secondary">
                More info <span class="oi oi-arrow-circle-right"></span>
            </a>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 mb-2 col-sm-6">
    <div class="card border-0 shadow-sm bg-primary text-light">
        <div class="card-body">
            <div class="media">
                <div class="media-body">
                    <h2 class="fw-bold">{{$jumlah_sekolah}}</h2>
                    <h6>Data Sekolah</h6>
                </div>
                <span class="oi oi-basket p-2 fs-9 text-indigo-lighter"></span>
            </div>
        </div>
        <div class="card-footer border-0 text-center p-1 bg-primary-darker">
            <a href="{{route('sekolah.index')}}" class="text-light">
                More info <span class="oi oi-arrow-circle-right"></span>
            </a>
        </div>
    </div>
</div>
<div class="col-lg-4  col-md-6 mb-2 col-sm-6">
    <div class="card border-0 shadow-sm bg-info text-light">
        <div class="card-body">
            <div class="media">
                <div class="media-body">
                    <h2 class="fw-bold">{{$jumlah_materi}}</h2>
                    <h6>Data Materi</h6>
                </div>
                <span class="oi oi-basket p-2 fs-9 text-indigo-lighter"></span>
            </div>
        </div>
        <div class="card-footer border-0 text-center p-1 bg-info-darker">
            <a href="{{route('materi.index')}}" class="text-light">
                More info <span class="oi oi-arrow-circle-right"></span>
            </a>
        </div>
    </div>
</div>

<div class="col-lg-4  col-md-6 mb-2 col-sm-6">
</div>

<div class="col-lg-4 col-md-6 mb-2 col-sm-6">
    <div class="card border-0 shadow-sm bg-warning-lightest text-dark">
        <div class="card-body">
            <div class="media">
                <div class="media-body">
                    <h2 class="fw-bold">{{$jumlah_user-1}}</h2>
                    <h6>Data User Ustadz</h6>
                </div>
                <span class="oi oi-basket p-2 fs-9 text-indigo-lighter"></span>
            </div>
        </div>
        <div class="card-footer border-0 text-center p-1 bg-warning">
            <a href="{{route('user.index')}}" class="text-dark">
                More info <span class="oi oi-arrow-circle-right"></span>
            </a>
        </div>
    </div>
</div>

@endsection
