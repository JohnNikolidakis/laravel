@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

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

		.full-height
		{
			height: 100vh;
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
			<div class="col-sm-3">
				<img class="img-fluid img-thumbnail"
					@if(  $bin->cur_capacity / $bin->max_capacity  == 0.25)
						src="img/Polish_Garbage/polish_trash_can_25.png">
						
					@elseif(  $bin->cur_capacity / $bin->max_capacity  == 0.5)
						src="img/Polish_Garbage/polish_trash_can_50.png">
						
					@elseif(  $bin->cur_capacity / $bin->max_capacity  == 0.75)
						src="img/Polish_Garbage/polish_trash_can_75.png">
						
					@elseif(  $bin->cur_capacity / $bin->max_capacity  == 1)
						src="img/Polish_Garbage/polish_trash_can_100.png">
						
					@elseif(  $bin->cur_capacity / $bin->max_capacity  == 0)
						src="img/Polish_Garbage/polish_trash_can_0.png">
						
					@endif
			</div>
				<p class="title_td">Max Capacity: {{ $bin->max_capacity }} <br> Current Capacity: {{ $bin->cur_capacity }}</p>
		</div>
		@endforeach
	</div>
</body>
@endsection
