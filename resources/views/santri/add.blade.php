@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Input Data Santri</h5>
        </div>
        <div class="card-body">
            <form action="#">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="#">Nama Lengkap</label>
                        <input type="text" class="form-control"  required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="#">Nama Panggilan</label>
                        <input type="text" class="form-control"  required>
                    </div>
                </div>
                <label class="mt-4" for="">Jenis Kelamin</label> <br>
                <input type="radio" name="rd1" id="rd1"> <label for="rd1">Laki-laki</label>
                <br>
                <input type="radio" name="rd1" id="rd2"> <label for="rd2">Perempuan</label>
                <br>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="#">Tanggal Lahir</label>
                        <input type="date" class="form-control"  required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="#">RT</label>
                        <input type="number" class="form-control"  required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="#">RW</label>
                        <input type="number" class="form-control"  required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="#">No.Rumah</label>
                        <input type="number" class="form-control"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="#">Wali</label>
                    <input  type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="#">Sekolah</label>
                    <input  type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="#">Tahun Masuk TPA</label>
                    <input  type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label>Kelas TPA</label>
                    <select class="form-control" name="" id="">
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 2</option>
                    </select>
                </div>
                <div class="form-group">
                        <label for="#">Foto</label>
                        <input  type="file" class="form-control">
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