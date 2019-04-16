@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Edit Data Ujian</h5>
        </div>
        <div class="card-body">
            <form action="{{route('ujian.update',$ujian->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="PUT" name="_method">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="mt-4" for="">Semester</label> <br>
                        <input type="radio" id="rd1" name="semester" value="ganjil"
                            {{ $ujian->semester=="ganjil"? "checked" : "" }}> <label for="rd1">Ganjil</label>
                        <br>
                        <input type="radio" id="rd2" name="semester" value="genap"
                            {{ $ujian->semester=="genap"? "checked" : "" }}> <label for="rd2">Genap</label>
                        <br>
                            <label for="#">Tahun</label>
                            <input type="number" class="form-control" name="tahun" required value="{{$ujian->tahun}}">

                        <label for="#">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" required value="{{$ujian->keterangan}}">
                    
                        <label class="mt-4" for="">Status</label> <br>
                        <input type="radio" id="rd3" name="status" {{$ujian->status==1? 'checked' : ''}} value="1"> <label for="rd3">Aktif</label>
                        <br>
                        <input type="radio" id="rd4" name="status" value="0" {{$ujian->status==0? 'checked' : ''}}> <label for="rd4">Tidak Aktif</label>
                        <br>    
                        <label for="materi_ujian">Materi yang diujiakan</label><br><select name="materi_ujian[]" multiple
                            id="materi_ujian" class="form-control"  ></select><br><br />
                    </div>
                </div>
                <div class="form-group" style="float: right;">
                    <input type="submit" class="btn btn-outline-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
    @endsection
    @section('footer-scripts')
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#materi_ujian').select2({
            ajax: {
                url: 'http://127.0.0.1:8000/materi/searchMateriAjax',
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item.id,
                                text: item.judul
                            }
                        })
                    }
                }
            }
        });
        var materis = {!!$ujian->materis!!}
        materis.forEach(function (materi) {
            var option = new Option(materi.judul, materi.id, true, true);
            $('#materi_ujian').append(option).trigger('change');
        });
    });
    
    </script>
    @endsection