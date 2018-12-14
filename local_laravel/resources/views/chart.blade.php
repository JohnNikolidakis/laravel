@extends('layouts.app')
@section('content')
<button class="btn btn-primary" onclick="post('asc');">Ascending chart</button>
<button class="btn btn-primary" onclick="post('desc');">Descending chart</button>
<p id="success"></p>
<div id="chart_div_asc"></div>
<div id="chart_div_desc"></div>


<script>
 $(document).ready(function()
{
	google.charts.load('current', {packages: ['corechart', 'bar']});
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajaxSetup({data:{_token: CSRF_TOKEN}});
	var ajax_asc = post('asc');
	var ajax_desc = post('desc');
	$.when(ajax_asc, ajax_desc).always(function(){ $('#success').html('Loading finished'); });
});

function post(x)
{
	return $.ajax
	({
		url:'chart_post',
		type: 'POST',
		data: {message:x},
		dataType: 'JSON',
		success: function (data)
		{ 
			drawAnnotations(data, x);
		}
	});
}

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
