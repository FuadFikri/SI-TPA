@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7 mb-2">
            <div class="card border-secondary text-dark shadow-sm">
                <div class="card-header bg-dark-lighter text-light" data-toggle="collapse" data-target="#collapsible-card-2">
                    <span class="btn p-0" >
                      <h4>Alamat</h4>
                    </span>
                </div>
                <div class="" id="collapsible-card-2">
                    <div class="card-body bg-secondary-lighter">
                        <canvas id="chartjs-bar"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 mb-2">
            <div class="card shadow-sm ">
                <div class="card-header bg-dark-lighter text-white" data-toggle="collapse" data-target="#collapsible-card-3">
                    <span class="btn p-0" >
                      <h4>  Sekolah</h4>
                    </span>
                </div>
                <div class="" id="collapsible-card-3">
                    <div class="card-body bg-secondary-lighter">
                        <canvas id="chartjs-doughnut-sekolah"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mb-2">
            <div class="card shadow-sm ">
                <div class="card-header bg-dark-lighter text-white" data-toggle="collapse" data-target="#collapsible-card-4">
                    <span class="btn p-0" >
                     <h4>Gender</h4>
                    </span>
                </div>
                <div class="" id="collapsible-card-4">
                    <div class="card-body bg-secondary-lighter">
                        <canvas id="chartjs-doughnut-gender"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-2">
                <div class="card shadow-sm ">
                        <div class="card-header bg-dark-lighter text-white" data-toggle="collapse" data-target="#collapsible-card-5">
                            <span class="btn p-0" >
                            <h4>Kelas</h4>
                            </span>
                        </div>
                        <div class="" id="collapsible-card-5">
                            <div class="card-body bg-secondary-lighter">
                                <canvas id="chartjs-doughnut-kelas"></canvas>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="col-sm-4 mb-2">
                <div class="card shadow-sm ">
                        <div class="card-header bg-dark-lighter text-white"  data-toggle="collapse" data-target="#collapsible-card-6">
                            <span class="btn p-0">
                            <h4>Aktif / Non Aktif</h4>
                            </span>
                        </div>
                        <div class="" id="collapsible-card-6">
                            <div class="card-body bg-secondary-lighter">
                                <canvas id="chartjs-doughnut-isActive"></canvas>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

</div>
@endsection
@section('footer-scripts')
<script type="text/javascript">
    var ctx = document.getElementById('chartjs-bar');
    var data = {
        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "luar"],
        datasets: [{
            label: 'Jumlah Santri per RT',
            data: [12, 19, 3, 5, 2, 3, 29, 2, 3, 4, 9, 10, 10, 1],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    }
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
    });


    // ----doughnut ----//

    // sekolah
    var ctxDoughnut = document.getElementById('chartjs-doughnut-sekolah')
    var myDoughnutChart = new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [10, 20, 30],
                backgroundColor: ['#24235C', '#47467A', 'aqua']
            }],
            labels: ['April', 'May', 'June']
        }
    })
    // end sekolah

    // gender
    var ctxDoughnut = document.getElementById('chartjs-doughnut-gender')
    var myDoughnutChart = new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [40, 60],
                backgroundColor: ['lightblue', 'pink']
            }],
            labels: ['Laki-laki', 'Perempuan']
        }
    })
    // end gender
    // Kelas
    var ctxDoughnut = document.getElementById('chartjs-doughnut-kelas')
    var myDoughnutChart = new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [40, 60, 22],
                backgroundColor: ['blue', 'yellow', 'red']
            }],
            labels: ['Laki-laki', 'Perempuan']
        }
    })
    // end kelas
    // isActive
    var ctxDoughnut = document.getElementById('chartjs-doughnut-isActive')
    var myDoughnutChart = new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [40, 60],
                backgroundColor: ['darkgreen', 'lightgreen']
            }],
            labels: ['Aktif', 'Tidak Aktif']
        }
    })
    // end kelas

</script>
@endsection