@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Edit Data Ujian</h5>
        </div>
        <div class="card-body">
            <form action="{{route('ujian.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="mt-4" for="">Semester</label> <br>
                        <input type="radio" id="rd1" name="semester" value="ganjil"> <label for="rd1">Ganjil</label>
                        <br>
                        <input type="radio" id="rd2" name="semester" value="genap"> <label for="rd2">Genap</label>
                        <br>
                        <label for="#">Tahun</label>
                        <input type="number" class="form-control" name="tahun" required>

                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5"></textarea>

                        <label class="mt-4" for="">Status</label> <br>
                        <input type="radio" id="rd3" name="status" value="1"> <label for="rd3">Aktif</label>
                        <br>
                        <input type="radio" id="rd4" name="status" value="0"> <label for="rd4">Tidak Aktif</label>
                        <br>
                    </div>
                </div>
                <div class="form-group" style="float: right;">
                    <input type="submit" class="btn btn-outline-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
    @endsection