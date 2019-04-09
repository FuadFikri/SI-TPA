@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-sm-12">
            <div class="card">
                <div class="card-header bg-white pb-1">
                    <h5 class="">Penilaian</h5>
                </div>
                <div class="card-body">
                    <div class="row" style="background-color:lavender;">
                        <div class="col-md-6 col-sm-12 ">
                            <h3>{{$santri->nama_lengkap}}</h3>
                            <h5>{{$santri->tgl_lahir}}</h5>
                            <h5>{{ $santri->kelas ? $santri->kelas->nama : 'kelas belum diisi'}}</h5>
                            <h5>{{$santri->sekolah->nama}}</h5>

                        </div>
                        <div class="col-md-6 col-sm-12 ">
                            <h5>RT {{$santri->RT}}</h5>
                            <h5>wali : {{$santri->nama_orang_tua}}</h5>
                            <h5>Masuk TPA : {{$santri->tahun_masuk_tpa}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($materi_sudah_dites)
                            Materi yang sudah dites :
                            
                            @forelse ($materi_sudah_dites as $item)
                            {{$item->materi->judul}}
                            @empty
                                belum ada
                            @endforelse
                            
                            @endif
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach ($daftar_materi as $materi)
                            <div class="col-lg-10 col-md-6 mb-2 col-sm-12">
                                <div class="card border-white text-dark border-0 shadow-sm">
                                    <div class="card-header bg-white">
                                        <span class="btn p-0" data-toggle="collapse"
                                            data-target="{{$materi->kelas == $santri->kelas ? '#collapsible-card-'.$materi->id : '#'}}">
                                                {{$materi->judul}} | {{$materi->kelas?$materi->kelas->nama : ''}} 
                                        </span>
                                    </div>
                                    <div class="collapse" id="collapsible-card-{{$materi->id}}">
                                        <div class="card-body bg-white">
                                            <p> {{$materi->deskripsi}}</p>
                                            <p style="color: red;">!! {{$materi->parameter_kelulusan}}</p>
                                            <form action="{{url('ustadz/simpan-nilai')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="materi_id" value="{{$materi->id}}">
                                                <input type="hidden" name="santri_id" value="{{$santri->id}}">
                                                <input type="hidden" name="ujian_id" value="{{$ujian->id}}">
                                                <div class="form-group">
                                                    <input type="number" name="nilai" class="form-control"
                                                        placeholder="0-10" required>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="deskripsi" id="" cols="30" rows="5"
                                                        class="form-control" placeholder="deskripsi hasil ujian"
                                                        required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Simpan" class="btn-sm btn-danger">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
