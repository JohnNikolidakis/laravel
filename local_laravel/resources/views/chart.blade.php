@extends('layouts.app')
@section('content')
<button class="btn btn-primary" onclick="post('asc');">Ascending chart</button>
<button class="btn btn-primary" onclick="post('desc');">Descending chart</button>
<div id="chart_div_asc"></div>
<p id="success_asc"></p>
<div id="chart_div_desc"></div>
<p id="success_desc"></p>

<script>
 $(document).ready(function()
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajaxSetup({data:{_token: CSRF_TOKEN}});
	//post('asc');
	//post('desc');
});

function post(x)
{
	$.ajax
	({
		url:'chart_post',
		type: 'POST',
		data: {message:x},
		dataType: 'JSON',
		success: function (data)
		{ 
			$('#success_'+x).html('Loading finished');
			drawAnnotations(data, x);
		}
	});
}
google.charts.load('current', {packages: ['corechart', 'bar']});

function drawAnnotations(datas, x)
{
	if(x == 'asc')
		var title='Ascending'
	else
		var title='Descending'
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'name');
	data.addColumn('number', 'current capacity');
	data.addColumn({type: 'string', role: 'annotation'});
	for(var i =0; i<datas.length; i++)
	{
		
		data.addRows
		([
			[datas[i].name, datas[i].cur_capacity, String(datas[i].cur_capacity)]
		]);
	}
	var options =
	{
		title: title,
		height:600,
		annotations:
		{
			alwaysOutside: true,
			textStyle:
			{
				fontSize: 14,
				color: '#000',
				auraColor: 'none'
			}
		},
		hAxis:
		{
			title: 'Name'
		},
		vAxis:
		{
			title: 'Current Capacity'
		}
	};
	var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_'+x));
	chart.draw(data, options);
}
</script>
@endsection
