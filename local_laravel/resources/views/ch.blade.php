<html>
	<head>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script src="https://unpkg.com/moment" /></script>
	</head>
	<body>
		<div id="dashboard">
			<div id="chart" style='width: 915px; height: 300px;'></div>
			<div id="control" style='width: 915px; height: 50px;'></div>
		</div>
	</body>
</html>
<script>
google.charts.load('visualization', '1.1', {packages: ['corechart', 'controls']});
google.charts.setOnLoadCallback(drawVisualization);
function drawVisualization()
{
	var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard'));
	var control = new google.visualization.ControlWrapper
	({
		'controlType': 'ChartRangeFilter',
		'containerId': 'control',
		'options':
		{
			'filterColumnIndex': 0,
			'ui':
			{
				'chartType': 'LineChart',
				'chartOptions':
				{
					'chartArea': {'width': '90%'},
					'hAxis': {'baselineColor': 'none', format: "dd.MM.yyyy" }
				},
				'chartView':
				{
					'columns': [0, 1]
				},
				'minRangeSize': 86400000	//One day
			}
		},
		'state': {'range': {'start': new Date(2012, 0, 1), 'end': new Date(2012, 4, 29)}}
	});

	var chart = new google.visualization.ChartWrapper
	({
		'chartType': 'LineChart',
		'containerId': 'chart',
		'options':
		{
			'chartArea': {'height': '80%', 'width': '90%'},
			'hAxis': {'slantedText': false},
			'vAxis': {'viewWindow': {'min': 0, 'max': 2000}},
			'legend': {'position': 'none'}
		},
		'view':
		{
			'columns':
			[{
				'calc': function(dataTable, rowIndex)
				{
					var value = dataTable.getValue(rowIndex, 0);
                    return moment(value).format("DD-MM-YYYY");
				},
				'type': 'string'
			}, 1]
		}
	});

	var data = new google.visualization.DataTable();
	data.addColumn('date', 'Date');
	data.addColumn('number', 'Stock');
	var open, close = 300;
	var low, high;
	for (var day = 1; day < 121; ++day)
	{
		var change = (Math.sin(day / 2.5 + Math.PI) + Math.sin(day / 3) - Math.cos(day * 0.7)) * 150;
		change = change >= 0 ? change + 10 : change - 10;
		open = close;
		close = Math.max(50, open + change);
		low = Math.min(open, close) - (Math.cos(day * 1.7) + 1) * 15;
		low = Math.round(Math.max(0, low));
		var date = new Date(2012, 0 ,day);
		data.addRow([date, low]);
	}
	dashboard.bind(control, chart);
	dashboard.draw(data);
}
</script>