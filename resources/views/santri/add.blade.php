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
                        <select class="form-control" id="" name="RT">
                            @for ($i = 1; $i < 14; $i++)
                                <option value="{{$i}}">{{$i}}</option>    
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="#">RW</label>
                        <select class="form-control" id="" name="RW">
                            <option value="45">45</option>    
                            <option value="46">46</option>    
                            <option value="47">47</option>    
                            <option value="48">48</option>    
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="#">No.Rumah</label>
                        <input type="number" class="form-control" name="no_rumah" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="#">Wali</label>
                    <input type="text" class="form-control" name="wali">
                </div>
                <div class="form-group">
                    <label for="#">Sekolah</label>
                    <select class="form-control" id="" name="sekolah">
                        @foreach ($daftar_sekolah as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="#">Tahun Masuk TPA</label>
                    <input type="number" class="form-control" name="thn_masuk">
                </div>
                <div class="form-group">
                    <label>Kelas TPA</label>
                    <select class="form-control" id="" name="kls_tpa">
                        @foreach ($daftar_kelas as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
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