@extends('layouts.global')

@section('content')
<div class="container">
    @if(session('status'))
        <div class="alert alert-success"> 
            {{session('status')}}
        </div>
    @endif
    <a href="{{route('user.create')}}" class="btn btn-lg btn-outline-primary "> Buat Akun</a>
    <div class="row justify-content-center">
        <h4>Data Akun  Ustadz/ Ustadzah</h4>
        <table class="table table-hover">
            <thead class="border-0">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach($daftar_user as $user)
                {{-- //tidak menampilkan user bertipe admin --}}
                @continue($user->role == 'admin')
                <tr>
                    <th>{{$i++}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    
                    <td>
                        <a href="{{url('user/'.$user->id.'/edit')}}" class="btn btn-outline-warning btn-sm">Sunting</a>
                    <form method="POST" class="d-inline" onsubmit="return confirm('Yakin akan di hapus?')" action="{{route('user.destroy',$user->id)}}">
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
            {{ $daftar_user->links() }}
        </ul>
    </div>
</div>
@endsection
