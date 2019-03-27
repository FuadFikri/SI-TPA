@extends('layouts.global')

@section('content')
<div class="container">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <a href="{{route('materi.create')}}" class="btn btn-lg btn-outline-primary "> Tambah materi</a>
    <div class="row justify-content-center">
        <h4>Data Materi</h4>
        <table class="table table-hover">
            <thead class="border-0">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">standar kelulusan</th>
                    <th scope="col">materi</th>
                    <th scope="col">kelas</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach($daftar_materi as $materi)
                <tr>
                    <th>{{$i++}}</th>
                    <td>{{$materi->judul}}</td>
                    <td>{{$materi->deskripsi}}</td>
                    <td>{{$materi->parameter_kelulusan}}</td>
                    <td>{{$materi->link_materi}}</td>
                    <td>{{$materi->kelas ? $materi->kelas->nama : 'kelas belum diisi'}}</td>

                    <td>
                        <a href="{{url('materi/'.$materi->id.'/edit')}}"
                            class="btn btn-outline-warning btn-sm">Sunting</a>
                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin akan di hapus?')"
                            action="{{route('materi.destroy',$materi->id)}}">
                            @csrf
                            <input type="hidden" value="DELETE" name="_method">
                            <input type="submit" value="Hapus" class="btn btn-outline-danger btn-sm">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <ul class="pagination ">
            {{ $daftar_materi->links() }}
        </ul>
    </div>
</div>
@endsection
