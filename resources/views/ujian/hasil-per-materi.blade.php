@extends('layouts.global')

@section('content')
<div class="container">
        <h4>Nilai {{$hasil->judul}}</h4>
        <p>jumlah data : {{count($hasil->santri_sudah_ujian)}} </h4>

    <div class="row justify-content-center">
        
         
        
        
        <table class="table table-hover">
            <thead class="border-0">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Penguji</th>
                    <th scope="col">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasil->santri_sudah_ujian as $santri)
                <tr>
                <td>{{$loop->iteration}}</td>
                    <td>{{$santri->nama_panggilan}}</td>
                    <td>{{$santri->pivot->nilai}}</td>
                    <td>{{$santri->pivot->penguji}}</td>
                    <td>{{$santri->pivot->deskripsi}}</td>
                    
                    {{-- <td>
                    <a href="{{route('ujian.show',$ujian->id)}}" class="btn btn-outline-success btn-sm">Detail</a>
                        <a href="{{route('ujian.edit',$ujian->id)}}" class="btn btn-outline-warning btn-sm">Sunting</a>
                    <form method="POST" class="d-inline" onsubmit="return confirm('Yakin akan di hapus?')" action="{{route('ujian.destroy',$ujian->id)}}">
                            @csrf
                            <input type="hidden" value="DELETE" name="_method">
                            <input type="submit" value="Hapus" class="btn btn-outline-danger btn-sm">
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <ul class="pagination ">
            {{ $daftar_ujian->appends(Request::all())->links() }}
        </ul> --}}
    </div>
</div>
@endsection
