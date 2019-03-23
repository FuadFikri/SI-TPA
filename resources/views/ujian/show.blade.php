@extends('layouts.global')
@section('content')
<div class="container">
        @if (session('status'))
            <div class="alert alert-warning">
                {{session('status')}}
            </div>
            
        @endif
    
        <a href="{{route('ujian.create')}}" class="btn btn-lg btn-outline-primary "> Input</a>
        <div class="row justify-content-center">
            <h4>Data</h4>
            <table class="table table-hover">
                <thead class="border-0">
                    <tr>
                        <th scope="col">Semester</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">keterangan</th>
                        <th scope="col">status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar_ujian as $ujian)
                    <tr>
                        <td>{{$ujian->semester}}</td>
                        <td>{{$ujian->tahun}}</td>
                        <td>{{$ujian->keterangan}}</td>
                        <td>
                            @if($ujian->status == 1)
                                <span class="badge badge-success"> Aktif </span>
                            @else
                                <span class="badge badge-danger">Tidak Aktif </span> 
                            @endif
                        </td>
                        <td>
                        <a href="{{route('ujian.show',$ujian->id)}}" class="btn btn-outline-success btn-sm">Detail</a>
                            <a href="{{route('ujian.edit',$ujian->id)}}" class="btn btn-outline-warning btn-sm">Sunting</a>
                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin akan di hapus?')" action="{{route('ujian.destroy',$ujian->id)}}">
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
                {{ $daftar_ujian->appends(Request::all())->links() }}
            </ul>
        </div>
    </div>
@endsection