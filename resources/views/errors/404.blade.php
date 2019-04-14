@extends('layouts.app')
@section('content')
<div class="d-flex flex-row justify-content-center">
    <div class="col-md-6 text-center">
        <div class="alert alert-danger">
            <h1>404</h1>
            {{-- <h4>{{$exception->getMessage()}}</h4> --}}
            <h4>Kamu Tersesat...</h4>
            <br>
            <h5>Halaman Tidak Ditemukan</h5>
        </div>
    </div>
</div>
            @endsection
