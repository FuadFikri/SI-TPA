@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Input Data Santri</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('santri.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="#">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="#">Nama Panggilan</label>
                        <input type="text" class="form-control" name="nama_panggilan" required>
                    </div>
                </div>
                <label class="mt-4" for="">Jenis Kelamin</label> <br>
                <input type="radio"  id="rd1" name="jenis_klm"> <label for="rd1">Laki-laki</label>
                <br>
                <input type="radio"  id="rd2" name="jenis_klm"> <label for="rd2">Perempuan</label>
                <br>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="#">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="#">RT</label>
                        <input type="number" class="form-control" name="RT" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="#">RW</label>
                        <input type="number" class="form-control" name="RW" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="#">No.Rumah</label>
                        <input type="number" class="form-control" name="no_rumah" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="#">Wali</label>
                    <input type="text" class="form-control" name="wali">
                </div>
                <div class="form-group">
                    <label for="#">Sekolah</label>
                    <input type="text" class="form-control" name="sekolah">
                </div>
                <div class="form-group">
                    <label for="#">Tahun Masuk TPA</label>
                    <input type="number" class="form-control" name="thn_masuk">
                </div>
                <div class="form-group">
                    <label>Kelas TPA</label>
                    <select class="form-control" id="" name="kls_tpa">
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 2</option>
                    </select>
                </div>
                <input type="hidden" name="inputBy" value="">
                <br>
                <div class="form-group" style="float: right;">
                    <input type="submit" class="btn btn-outline-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection