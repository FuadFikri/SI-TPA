@extends('layouts.global')

@section('content')
<div class="container">
        <a href="{{route('santri.create')}}" class="btn btn-lg btn-outline-primary ">  Input</a>
        <a href="{{url('santri/import')}}" class="btn btn-lg btn-light">  Import </a>
    <div class="row justify-content-center">
        <h4>Data</h4>
        <table class="table table-hover">
            <thead class="border-0">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">RT</th>
                    <th scope="col">Wali</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($santris as $santri)
                <tr>
                    <th>{{$santri->id}}</th>
                    <td>{{$santri->nama_panggilan}}</td>
                    <td>{{$santri->kelas->nama}}</td>
                    <td>{{$santri->RT}}</td>
                    <td>{{$santri->nama_orang_tua}}</td>
                    <td>
                        <a href="" class="btn btn-outline-success btn-sm">Detail</a>
                        <a href="" class="btn btn-outline-warning btn-sm">Sunting</a>
                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin akan di hapus?')" action="">
                            @csrf
                            <input type="hidden" value="DELETE" name="_method">
                            <input type="submit" value="Hapus" class="btn btn-outline-danger btn-sm">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <!-- <tfoot>
                <tr>
                    <td>
                        <nav aria-label="...">
                            <ul class="pagination ">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active bg-success-darker">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </td>
                </tr>
            </tfoot> -->
        </table>
    </div>
</div>
@endsection
