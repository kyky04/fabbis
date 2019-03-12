@extends('layouts.scaffold')

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js">></script>
<script src="{{ asset('js/dummy.js') }}"></script>
<script>
    var ctx = document.getElementById('chart-area').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor()
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
            ]
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                position: 'right'
            }
        }
    });

    var ctx = document.getElementById('graph-area').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'November',
                'Desember',
                'Januari',
                'Februari',
                'Maret'
            ],
            datasets: [{
                data: [
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor()
                ],
                backgroundColor: "rgba(255, 99, 132, .15)",
                borderColor: "rgba(255, 99, 132, 1)",
                label: 'Item 1',
                lineTension: 0
            }, {
                data: [
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor()
                ],
                backgroundColor: "rgba(75, 192, 192, .15)",
                borderColor: "rgba(75, 192, 192, 1)",
                label: 'Item 2',
                lineTension: 0
            }, {
                data: [
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor()
                ],
                backgroundColor: "rgba(54, 162, 235, .15)",
                borderColor: "rgba(54, 162, 235, 1)",
                label: 'Item 3',
                lineTension: 0
            }, {
                data: [
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor()
                ],
                backgroundColor: "rgba(255, 159, 64, .15)",
                borderColor: "rgba(255, 159, 64, 1)",
                label: 'Item 4',
                lineTension: 0
            }],
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                position: 'bottom'
            }
        }
    });

    $('.dashboard-helper').slick({
        slidesToShow: 4,
        slidesToScroll: 1
    }); 
</script>
@append

@section('content')
<div class="title-container">
    <div class="ui breadcrumb">
        <a href="#" class="section">
            <i class="home icon"></i>
        </a>
        <i class="right chevron icon divider"></i>
        <div class="active section">Dashboard</div>
    </div>
    <h2 class="ui header">
        <div class="content">
            Dashboard
            <div class="sub header"> </div>
        </div>
    </h2>
    </div>

    <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>
    <div class="dashboard-helper">
        <div class="ui blue inverted segment center aligned">
            <div class="ui statistics">
                <div class="statistic">
                    <div class="value">
                        <i class="search icon"></i> 5
                    </div>
                    <div class="label">
                        Item
                    </div>
                </div>
            </div>
        </div>
        <div class="ui teal inverted segment center aligned">
            <div class="ui statistics">
                <div class="statistic">
                    <div class="value">
                        <i class="suitcase icon"></i> 5
                    </div>
                    <div class="label">
                        Item
                    </div>
                </div>
            </div>
        </div>
        <div class="ui orange inverted segment center aligned">
            <div class="ui statistics">
                <div class="statistic">
                    <div class="value">
                        <i class="folder icon"></i> 5
                    </div>
                    <div class="label">
                        Item
                    </div>
                </div>
            </div>
        </div>
        <div class="ui red inverted segment center aligned">
            <div class="ui statistics">
                <div class="statistic">
                    <div class="value">
                        <i class="plane icon"></i> 5
                    </div>
                    <div class="label">
                        Item
                    </div>
                </div>
            </div>
        </div>
        <div class="ui olive inverted segment center aligned">
            <div class="ui statistics">
                <div class="statistic">
                    <div class="value">
                        <i class="book icon"></i> 5
                    </div>
                    <div class="label">
                        Item
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid">
        <div class="ten wide column">
            <h5 class="ui top attached header">
                Sample Graph
            </h5>
            <div class="ui bottom attached segment">
                <canvas id="graph-area"></canvas>
            </div>
        </div>
        <div class="six wide column">
            <h5 class="ui top attached header">
                Sample Pie Chart
            </h5>
            <div class="ui bottom attached segment">
                <div id="canvas-holder">
                    <canvas id="chart-area"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection