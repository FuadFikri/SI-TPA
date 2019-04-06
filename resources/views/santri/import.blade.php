@extends('layouts.global')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Import Data Santri</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <span class="bg-warning-lighter pl-3">Penting !!!</span>

            </div>
            <p>Pastikan file excel sesuai dengan format dibawah</p>
            <p> lihat contoh file <a href="#">download</a></p>
            <img src="{{url('img_sys/excel.png')}}" alt="" style="width:80%; border:black;">
            <p>===========================================================================</p>
            <div class="container">
                <div class="row">

                <form action="{{url('santri/import')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                        <label for="#" class="bg-warning-lighter pl-3">Upload disini</label>
                        <input type="file" class="form-control" required name="file_data_santri">
                        <br>
                        <input type="submit" value="Upload" class="btn-info btn btn-lg">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection