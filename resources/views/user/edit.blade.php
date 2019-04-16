@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Buat Akun</h5>
        </div>
        <div class="card-body">
            <form action="{{route('user.update',$user->id)}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="#">Nama </label>
                            <input type="text" class="form-control" value="{{$user->name}}" name="name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="#">Email</label>
                            <input type="text" class="form-control" name="email" required value="{{$user->email}}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="#">Password </label>
                            <input type="password" class="form-control" name="password"  placeholder="ganti password ?">
                        </div>
                </div>
                <div class="form-group" style="float: right;">
                
                <button  class="btn btn-outline-success" href="{{route('user.index')}}">Kembali</button>
                <input type="submit" class="btn btn-outline-warning" value="Simpan">
                </div>
            </form>

        </div>
    </div>
</div>
    @endsection