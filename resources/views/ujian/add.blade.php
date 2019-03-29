@extends('layouts.global')
@section('content')
<div class="col-lg-9">
    <div class="card">
        <div class="card-header bg-white pb-1">
            <h5>Edit Data Ujian</h5>
        </div>
        <div class="card-body">
            <form action="{{route('ujian.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="mt-4" for="">Semester</label> <br>
                        <input type="radio" id="rd1" name="semester" value="ganjil" required> <label for="rd1">Ganjil</label>
                        <br>
                        <input type="radio" id="rd2" name="semester" value="genap" required> <label for="rd2">Genap</label>
                        <br>
                        <label for="#">Tahun</label>
                        <input type="number" class="form-control" name="tahun" required>

                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5" required></textarea>

                        <label class="mt-4" for="">Status</label> <br>
                        <input type="radio" id="rd3" name="status" value="1" required> <label for="rd3">Aktif</label>
                        <br>
                        <input type="radio" id="rd4" name="status" value="0" required> <label for="rd4">Tidak Aktif</label>
                        <br>
                        <label for="materi_ujian">Materi yang diujiakan</label><br><select name="materi_ujian[]" multiple
                            id="materi_ujian" class="form-control" ></select><br><br />
                    </div>
                </div>
                <div class="form-group" style="float: right;">
                    <input type="submit" class="btn btn-outline-primary" value="Simpan">
                </div>
            </form>
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
            url: 'http://localhost:8000/materi/searchMateriAjax',
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

});

</script>
@endsection