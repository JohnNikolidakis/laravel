<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://unpkg.com/moment" /></script>
<div id="dashboard_div">
	<div id="filter_div"></div>
	<div id="chart_div"></div>
</div>
<p id="p"></p>
<p id="p1"></p>
<p id="p2"></p>
<p id="p3"></p>
<script>

google.charts.load('current', {packages:['corechart', 'controls']});
google.charts.setOnLoadCallback(drawBasic);
function drawBasic()
{
	var data = new google.visualization.DataTable();
	data.addColumn('number', 'X');
	data.addColumn('number', 'Dogs');
	data.addRows
	([
		[0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
		[6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
		[12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
		[18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
		[24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
		[30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
		[36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
		[42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
		[48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
		[54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
		[60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
		[66, 70], [67, 72], [68, 75], [69, 80]
	]);

	var options =
	{
		curveType: 'function',
		height:400,
		hAxis:
		{
			title: 'Time'
		},
		vAxis:
		{
			title: 'Popularity'
		}
	};
	
	var donutRangeSlider = new google.visualization.ControlWrapper
	({
		'controlType': 'NumberRangeFilter',
		'containerId': 'filter_div',
		'options': 
		{
			'filterColumnLabel': 'X'
		}
	});
	
	var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard_div'));
	
	var chart = new google.visualization.ChartWrapper
	({
		'chartType': 'LineChart',
		'containerId': 'chart_div',
		'options': options
	});
	dashboard.bind(donutRangeSlider,chart);
	dashboard.draw(data, options);
	function resize ()
	{
		chart.draw(data, options);
	}
	if (window.addEventListener)
	{
		window.addEventListener('resize', resize);
	}
	else
	{
		window.attachEvent('onresize', resize);
	}
}
document.getElementById("p").innerHTML = moment().format('DD-MM-YYYY');
document.getElementById("p1").innerHTML = moment().format('DD-MM-YYYY h:m:ss');
document.getElementById("p2").innerHTML = moment().format('YYYY');
document.getElementById("p3").innerHTML = moment().valueOf();
</script>