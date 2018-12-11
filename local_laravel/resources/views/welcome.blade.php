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
		
		.card-container
		{
			width:60%;
		}
	</style>
</head>
<body>
	<div class="container">
		@foreach($bins as $bin)
		<div class="row">
			<div class="card text-white bg-secondary border-dark mb-3 card-container">
				<div class="row m-0">
					<div class="col-sm-4 p-0">
						<img class="img-fluid img-thumbnail p-0" 
							@if(  $bin->cur_capacity / $bin->max_capacity  == 0)
								src="img/Polish_Garbage/polish_trash_can_0.png"
							@elseif(  $bin->cur_capacity / $bin->max_capacity  <= 0.25)
								src="img/Polish_Garbage/polish_trash_can_25.png"
							@elseif(  $bin->cur_capacity / $bin->max_capacity  <= 0.5)
								src="img/Polish_Garbage/polish_trash_can_50.png"
							@elseif(  $bin->cur_capacity / $bin->max_capacity  <= 0.75)
								src="img/Polish_Garbage/polish_trash_can_75.png"
							@elseif(  $bin->cur_capacity / $bin->max_capacity  <= 1)
								src="img/Polish_Garbage/polish_trash_can_100.png"
							@endif
						data-html="true" data-toggle="tooltip" data-placement="left" title="{{ __('layout.name') }}: {{$bin->name }}<br>{{ __('trash.max_capacity') }}: {{ $bin->max_capacity }} <br> {{ __('trash.cur_capacity') }}: {{ $bin->cur_capacity }}">
					</div>
					<div class="col-md-8 p-0">
						<div class="card-block">
							<p class="title_td ml-3 mt-2">{{ __('layout.name') }}: {{$bin->name }}<br>{{ __('trash.max_capacity') }}: {{ $bin->max_capacity }} <br> {{ __('trash.cur_capacity') }}: {{ $bin->cur_capacity }}</p>
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
