@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<!-- Styles -->
	<style>
		html, body
		{
			background-color: #fff;
			color: #636b6f;
			font-family: 'Nunito', sans-serif;
			font-weight: 200;
			height: 100vh;
			margin: 0;
		}
		
		.img-container
		{
			width:100%;
		}
	</style>
</head>
<body>
	<div class="container">
		@foreach($bins as $bin)
		<div class="row">
			<div class="card text-white bg-secondary border-dark mb-3">
				<div class="row m-0">
					<div class="col-sm-4 p-0">
							@if(  $bin->cur_capacity / $bin->max_capacity  == 0)
								<img class="img-fluid img-thumbnail p-0" src="img/Polish_Garbage/polish_trash_can_0.png" data-html="true" data-toggle="tooltip" data-placement="left" title="Name: {{$bin->name }}<br>Max Capacity: {{ $bin->max_capacity }} <br> Current Capacity: {{ $bin->cur_capacity }}">
							@elseif(  $bin->cur_capacity / $bin->max_capacity  <= 0.25)
								<img class="img-fluid img-thumbnail p-0" src="img/Polish_Garbage/polish_trash_can_25.png" data-html="true" data-toggle="tooltip" data-placement="left" title="Name: {{$bin->name }}<br>Max Capacity: {{ $bin->max_capacity }} <br> Current Capacity: {{ $bin->cur_capacity }}">
							@elseif(  $bin->cur_capacity / $bin->max_capacity  <= 0.5)
								<img class="img-fluid img-thumbnail p-0" src="img/Polish_Garbage/polish_trash_can_50.png" data-html="true" data-toggle="tooltip" data-placement="left" title="Name: {{$bin->name }}<br>Max Capacity: {{ $bin->max_capacity }} <br> Current Capacity: {{ $bin->cur_capacity }}">
							@elseif(  $bin->cur_capacity / $bin->max_capacity  <= 0.75)
								<img class="img-fluid img-thumbnail p-0" src="img/Polish_Garbage/polish_trash_can_75.png" data-html="true" data-toggle="tooltip" data-placement="left" title="Name: {{$bin->name }}<br>Max Capacity: {{ $bin->max_capacity }} <br> Current Capacity: {{ $bin->cur_capacity }}">
							@elseif(  $bin->cur_capacity / $bin->max_capacity  <= 1)
								<img class="img-fluid img-thumbnail p-0" src="img/Polish_Garbage/polish_trash_can_100.png" data-html="true" data-toggle="tooltip" data-placement="left" title="Name: {{$bin->name }}<br>Max Capacity: {{ $bin->max_capacity }} <br> Current Capacity: {{ $bin->cur_capacity }}">
							@endif
					</div>
					<div class="col-md-8 p-0">
						<div class="card-block">
							<p class="title_td">Name: {{$bin->name }}<br>Max Capacity: {{ $bin->max_capacity }} <br> Current Capacity: {{ $bin->cur_capacity }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</body>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection
