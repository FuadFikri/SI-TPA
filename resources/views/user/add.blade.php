@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Buat Akun</h5>
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="#">Nama </label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="#">Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="#">Password </label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                </div>
                <div class="form-group" style="float: right;">
                    <input type="submit" class="btn btn-outline-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
    @endsection