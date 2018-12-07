<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div"></div>

<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAnnotations);
function drawAnnotations()
{
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'name');
	data.addColumn('number', 'current capacity');
	data.addColumn({type: 'string', role: 'annotation'});
	data.addRows
	([
		@foreach($bins as $bin)
			['{{$bin->name}}',{{$bin->cur_capacity}},'{{$bin->cur_capacity}}'],
		@endforeach
	]);
	var options =
	{
		title: 'Garbage Bins',
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
	var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
	chart.draw(data, options);
}
</script>
