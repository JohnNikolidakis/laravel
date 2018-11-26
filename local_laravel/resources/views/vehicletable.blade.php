@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
	.title_td
	{
		font-weight:1000;
		font-size:27px;
	}
	.td_sub
	{
		font-size:13px;
	}
</style>
<div class="table-responsive">
	<table class="table table-bordered table-striped" style="text-align:center;">
		<tr>
			<td class="title_td">Licence</td>
			<td class="title_td">Liters</td>
		</tr>
		@foreach($vehicles as $vehicle)
		<tr>
			<td id='licence' class="td_sub">{{ $vehicle->licence }}</td>
			<td id='liters' class="td_sub">{{ $vehicle->liters }}</td>
		</tr>
		@endforeach
	</table>
</div>
<div width="300px" height="300px" class="chart-container">
	<canvas id="myChart" width="300px" height="300px"></canvas>
</div>
<div id="chart_div" style="height:400px"></div>
@endsection
</body>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var licence=[];
var liters=[];
@foreach($vehicles as $vehicle)
	licence.push(' {{ $vehicle->licence }} ');
	liters.push({{ $vehicle->liters }});
@endforeach
var chart = new Chart(ctx,{type:'bar',
	data:
	{
		labels:licence,
	},
	options:
	{
		responsive: true,
		maintainAspectRatio: false,
        scales:
		{
			xAxes:
			[{
				barPercentage:0.6,
				categoryPercentage:1
			}],
            yAxes:
			[{
                ticks:
				{
                    beginAtZero:true
                }
            }]
        }
	}
});
chart.data.datasets.push({label:'liters',data:liters});
chart.update();

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);
function drawBasic()
{
	var data = google.visualization.arrayToDataTable
	([
		['Licence', 'Liters'],
		@foreach($vehicles as $vehicle)
			['{{ $vehicle->licence}}',{{$vehicle->liters}}],
		@endforeach
	]);
	var options =
	{
		vAxis:
		{
			title: 'Liters'
		}
	};
	var chart = new google.visualization.ColumnChart(
	document.getElementById('chart_div'));
	chart.draw(data, options);
}
</script>
</html>