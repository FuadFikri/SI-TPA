@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Tambah  materi</h5>
        </div>
        <div class="card-body">
            <form action="{{route('materi.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="#">Judul materi</label>
                            <input type="text" class="form-control" name="judul" required >
                        </div>
                        
                        <label for="#">Standar Kelulusan</label>
                        <input type="text" class="form-control" name="parameter_kelulusan" required >

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Materi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                        </div>
                        <br/>
                        <label for="link_materi">referensi materi</label>
                        <input type="url" name="link_materi" id="link_materi" class="form-control" placeholder="http://www.google.com">

                        <div class="form-group">
                            <label>Kelas TPA</label>
                            <select class="form-control" id="" name="kelas_id"   required>
                                @foreach ($daftar_kelas as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
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
    @endsection
