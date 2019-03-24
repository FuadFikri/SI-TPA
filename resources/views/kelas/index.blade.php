@extends('layouts.global')

@section('content')
<div class="container">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <a href="{{route('kelas.create')}}" class="btn btn-lg btn-outline-primary "> Tambah kelas</a>
    <div class="row justify-content-center">
        <h4>Data</h4>
        <table class="table table-hover">
            <thead class="border-0">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenjang</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach($daftar_kelas as $kelas)
                <tr>
                    <th>{{$i++}}</th>
                    <td>{{$kelas->nama}}</td>
                    <td>{{$kelas->ketentuan}}</td>

                    <td>
                        <a href="{{url('kelas/'.$kelas->id.'/edit')}}"
                            class="btn btn-outline-warning btn-sm">Sunting</a>
                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin akan di hapus?')"
                            action="{{route('kelas.destroy',$kelas->id)}}">
                            @csrf
                            <input type="hidden" value="DELETE" name="_method">
                            <input type="submit" value="Hapus" class="btn btn-outline-danger btn-sm">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <ul class="pagination ">
            {{ $daftar_kelas->links() }}
        </ul> --}}
    </div>
</div>
@endsection
