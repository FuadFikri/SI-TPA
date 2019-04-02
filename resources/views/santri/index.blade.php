@extends('layouts.global')

@section('content')
<div class="container">
    @if(session('status'))
        <div class="alert alert-success"> 
            {{session('status')}}
        </div>
    @endif
    <a href="{{route('santri.create')}}" class="btn btn-lg btn-outline-primary "> Input</a>
    <a href="{{url('santri/import')}}" class="btn btn-lg btn-light"> Import </a>
    <div class="row justify-content-center">
        <h4>Data</h4>
        <table class="table table-hover">
            <thead class="border-0">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Sekolah</th>
                    <th scope="col">RT</th>
                    <th scope="col">Wali</th>
                    <th scope="col">Status Santri</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($daftar_santri as $santri)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$santri->nama_panggilan}}</td>
                    <td>{{$santri->kelas != null ? $santri->kelas->nama : ''}}</td>
                    <td>
                        @if ($santri->sekolah)
                        {{$santri->sekolah->nama}}    
                        @endif
                        </td>
                    <td>{{$santri->RT}}</td>
                    <td>{{$santri->nama_orang_tua}}</td>
                    <td>
                        @if($santri->isActive == 1)
                            <span class="badge badge-success"> Aktif </span>
                        @else
                            <span class="badge badge-danger">Tidak Aktif </span> 
                        @endif

                    </td>
                    <td>
                        <a href="{{url('santri/'.$santri->id)}}" class="btn btn-outline-success btn-sm">Detail</a>
                        <a href="{{url('santri/'.$santri->id.'/edit')}}" class="btn btn-outline-warning btn-sm">Sunting</a>
                    <form method="POST" class="d-inline" onsubmit="return confirm('Yakin akan di hapus?')" action="{{route('santri.destroy',$santri->id)}}">
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
            {{ $daftar_santri->links() }}
        </ul>
    </div>
</div>
@endsection
