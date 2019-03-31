@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-white pb-1">
                    <h5 class="">Data Detail</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <ul>
                            <li>judul
                                <ul>
                                    <li> <b>{{$materi->judul}}</b></li>
                                </ul>
                            </li>
                            <li>Deskripsi
                                <ul>
                                        <li><b>{{$materi->deskripsi}}</b></li>
                                </ul>
                            </li>
                            <li>Link Materi
                                <ul>
                                        <li> <a href="{{$materi->link_materi}}" target="_blank"> <b>referensi materi</b></a></li>
                                </ul>
                            </li>
                            <li>Standar Kelulusan
                                <ul>
                                        <li><b> {{$materi->parameter_kelulusan}}</b></li>
                                </ul>
                            </li>
                           <li> Kelas
                               <ul>
                                    <li> <b>{{$materi->kelas?$materi->kelas->nama :'belum diisi'}}</b></li>
                               </ul>
                           </li>
                            

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
