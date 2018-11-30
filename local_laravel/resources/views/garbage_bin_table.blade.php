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
	<input type="submit" value="Export to XLSX" class="btn btn-primary mr-4" onclick="xport('xlsx');">
	<input type="submit" value="Export to XLS" class="btn btn-primary" onclick="xport('xls');">
	<form style="float:right" method="GET" action="garbage_bin_table_search">
		<input class="form-control search_bar" type="text" placeholder="Search.." name="search">
		<input type="submit" value="Submit" class="btn btn-primary ml-3">
	</form>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-striped" style="text-align:center;" id="data-table">
		<tr>
			<td class="title_td">Name</td>
			<td class="title_td">Maximum Capacity</td>
			<td class="title_td">Current Capacity</td>
		</tr>
		@foreach($bin as $bins)
		<tr {{ ($loop->first) ? "class=d-print-table-row" : "class=d-print-none" }}>
			<td class="td_sub">{{ $bins->name }}</td>
			<td class="td_sub">{{ $bins->max_capacity }}</td>
			<td class="td_sub">{{ $bins->cur_capacity }}</td>
		</tr>
		@endforeach
	</table>
</div>
<script>	
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