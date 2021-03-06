@extends('layouts.app')
@section('content')
<head>
<script type="text/javascript" src="//unpkg.com/file-saver@1.3.3/FileSaver.js"></script>
<script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<style>
	.search_bar
	{
		width:200px;
		float:left;
	}
</style>
</head>
<div class="container mb-4">
	<a href="garbage_register" class="btn btn-primary">{{ __('trash.new_garb') }}</a>
	<input type="submit" value="{{ trans_choice('trash.export',0) }}" class="btn btn-primary" onclick="xport('xlsx');">
	<input type="submit" value="{{ trans_choice('trash.export',1) }}" class="btn btn-primary ml-2" onclick="xport('xls');">
	<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#chartModal">{{ __('trash.chart') }}</button>
	<form style="float:right" method="GET" action="garbage_bin_table_search">
		<input class="form-control search_bar" type="text" placeholder="{{ __('trash.search') }}" name="search">
		<input type="submit" value="{{ __('trash.submit') }}" class="btn btn-primary ml-3">
	</form>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-striped" style="text-align:center;" id="data-table">
		<tr>
			<td class="title_td">{{ __('trash.name') }}</td>
			<td class="title_td">{{ __('trash.max_capacity') }}</td>
			<td class="title_td">{{ __('trash.cur_capacity') }}</td>
		</tr {{ $x=0 }}>
		@foreach($bin as $bins)
		<tr {{ ($loop->first) ? "class=d-print-table-row" : "class=d-print-none" }}>
			<td><a id="name_{{ $x }}" href="garbage_edit/{{ $bins->name }}/{{ $bins->max_capacity }}/{{ $bins->cur_capacity }}" class="td_sub">{{ $bins->name }}</a></td>
			<td id="max_capacity">{{ $bins->max_capacity }}</td>
			<td id="cur_capacity">{{ $bins->cur_capacity }}</td>
		</tr{{ $x++}}>
		@endforeach
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="chartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">{{ __('trash.chart_title') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<div class="modal-body">
				<div id="chart_div" width="100%" style="overflow:hidden"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trash.close') }}</button>
			</div>
		</div>
	</div>
</div>
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic()
{
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'name');
	data.addColumn('number', 'capacity');
	var data = google.visualization.arrayToDataTable
	([
		['name', 'capacity'],
		@foreach($bin as $bins)
			['{{ $bins->name }}',{{ $bins->cur_capacity }}],
		@endforeach
	]);

	var options =
	{
		legend: {position: 'top'},
		hAxis:
		{
			title: "{{ __('trash.name') }}",
		},
		vAxis:
		{
			title: "{{ __('trash.capacity') }}",
		}
	};
	var chart = new google.visualization.ColumnChart(
	document.getElementById('chart_div'));
	chart.draw(data, options);
}

function xport(type, dl)
{
	var elt = document.getElementById('data-table');
	var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
	return dl ?
		XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
		XLSX.writeFile(wb,('garbage_register.' + (type || 'xlsx')));
}
</script>
@endsection