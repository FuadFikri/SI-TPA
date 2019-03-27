@extends('layouts.global')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h4>Data</h4>
        <table class="table table-hover">
            <thead class="border-0">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar_santri as $santri)
                <tr>
                    <td>{{$santri->nama_panggilan}} | {{$santri->nama_lengkap}}</td>
                    <td>{{$santri->kelas? $santri->kelas->nama : ''}}</td>
                    <td>
                    <form action="{{url('ustadz/penilaian')}}" method="POST">
                        @csrf
                    <input type="hidden" name="ujian_id" value="{{$ujian_id}}">
                    <input type="hidden" name="santri_id" value="{{$santri->id}}">
                    <input type="submit" value="UJI" class="btn btn-info btn-sm">
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
