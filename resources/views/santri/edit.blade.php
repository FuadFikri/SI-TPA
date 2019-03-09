@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Edit Data Santri</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('santri.update',$santri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="PUT" name="_method">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="#">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" required value="{{$santri->nama_lengkap}}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="#">Nama Panggilan</label>
                        <input type="text" class="form-control" name="nama_panggilan" required value="{{$santri->nama_panggilan}}">
                    </div>
                </div>
                <label class="mt-4" for="">Jenis Kelamin</label> <br>
                <input type="radio"  id="rd1" name="jenis_klm"   value="laki-laki" {{ $santri->jenis_kelamin=="laki-laki"? "checked" : "" }}> <label for="rd1">Laki-laki</label>
                <br>
                <input type="radio"  id="rd2" name="jenis_klm" value="perempuan" {{ $santri->jenis_kelamin=="perempuan"? "checked" : "" }}> <label for="rd2">Perempuan</label>
                <br>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="#">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" required value="{{$santri->tgl_lahir}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="#">RT</label>
                        <select class="form-control" id="" name="RT" value="{{$santri->RT}}>
                            @for ($i = 1; $i < 14; $i++)
                                <option value="{{$i}}">{{$i}}</option>    
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="#">RW</label>
                        <select class="form-control" id="" name="RW" value="{{$santri->RW}}">
                            <option value="45">45</option>    
                            <option value="46">46</option>    
                            <option value="47">47</option>    
                            <option value="48">48</option>    
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="#">No.Rumah</label>
                        <input type="number" class="form-control" name="no_rumah" value="{{$santri->no_rumah}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="#">Wali</label>
                    <input type="text" class="form-control" name="wali" value="{{$santri->nama_orang_tua}}">
                </div>
                <div class="form-group">
                    <label for="#">Sekolah</label>
                    <select class="form-control" id="" name="sekolah" value="{{$santri->sekolah->nama}}">
                        @foreach ($daftar_sekolah as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="#">Tahun Masuk TPA</label>
                    <input type="number" class="form-control" name="thn_masuk" value="{{$santri->tahun_masuk_tpa}}">
                </div>
                <div class="form-group">
                    <label>Kelas TPA</label>
                    <select class="form-control" id="" name="kls_tpa" value="{{$santri->kelas->nama}} >
                        @foreach ($daftar_kelas as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" name="avatar">
                </div>
                <label class="mt-4" for="">Status</label> <br>
                <input type="radio"  id="rd3" name="isActive"   value="1" {{ $santri->isActive==1? "checked" : "" }}> <label for="rd3">Aktif</label>
                <br>
                <input type="radio"  id="rd4" name="isActive" value="0" {{ $santri->isActive==0? "checked" : "" }}> <label for="rd4">Tidak Aktif</label>
                <br>
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