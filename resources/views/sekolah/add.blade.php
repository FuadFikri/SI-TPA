@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Tambah  sekolah</h5>
        </div>
        <div class="card-body">
            <form action="{{route('sekolah.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">

                        <label for="#">Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" required >

                        <div class="form-group">
                            <label for="#">Jenjang</label>
                            <select class="form-control" id="" name="jenjang" required>
                                <option value="PAUD">PAUD</option>
                                <option value="TK">TK</option>
                                <option value="SD">SD</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="form-group" style="float: right;">
                    <input type="submit" class="btn btn-outline-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
    @endsection
