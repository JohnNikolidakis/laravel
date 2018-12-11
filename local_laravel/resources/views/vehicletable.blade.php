@extends('layouts.app')
@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-striped" style="text-align:center;">
		<tr>
			<td class="title_td">{{ __('vehicle.licence') }}</td>
			<td class="title_td">{{ __('vehicle.liters') }}</td>
		</tr>
		@foreach($vehicles as $vehicle)
		<tr>
			<td id='licence' class="td_sub">{{ $vehicle->licence }}</td>
			<td id='liters' class="td_sub">{{ $vehicle->liters }}</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection
</body>
</html>