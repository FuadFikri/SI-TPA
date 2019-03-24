@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Edit Data kelas</h5>
        </div>
        <div class="card-body">
            <form action="{{route('kelas.update',$kelas->id)}}" method="POST">
                @csrf
                <input type="hidden" value="PUT" name="_method">
                <div class="row">
                    <div class="col-md-6 mb-3">

                        <label for="#">Nama kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" required value="{{$kelas->nama}}">
                        <label for="#">Ketentuan</label>
                        <input type="text" class="form-control" name="ketentuan" required value="{{$kelas->ketentuan}}">


                    </div>
                </div>
                <div class="form-group" style="float: right;">
                    <input type="submit" class="btn btn-outline-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
    @endsection
