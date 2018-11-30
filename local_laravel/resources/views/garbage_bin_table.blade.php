@extends('layouts.app')
@section('content')
<head>
<script type="text/javascript" src="//unpkg.com/file-saver@1.3.3/FileSaver.js"></script>
<script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
</head>
<div class="table-responsive">
	<table class="table table-bordered table-striped" style="text-align:center;" id="data-table">
		<tr>
			<td class="title_td">Maximum Capacity</td>
			<td class="title_td">Current Capacity</td>
		</tr>
		@foreach($bin as $bins)
		<tr {{ ($loop->first) ? "class=d-print-table-row" : "class=d-print-none" }}>
			<td class="td_sub">{{ $bins->max_capacity }}</td>
			<td class="td_sub">{{ $bins->cur_capacity }}</td>
		</tr>
		@endforeach
	</table>
</div>
<div class="container">
	<input type="submit" value="Export to XLSX" class="btn btn-primary mr-4" onclick="xport('xlsx');">
	<input type="submit" value="Export to XLS" class="btn btn-primary" onclick="xport('xls');">
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