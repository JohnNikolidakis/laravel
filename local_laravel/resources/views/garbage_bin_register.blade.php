@extends('layouts.app')

@section('content')
<h1 style="font-weight:bold" class="ml-3"><label for="new_title">{{ __('trash.title_new') }}</label></h1>
<form method="GET" action="garbage_bin_insert" class="needs-validation"  novalidate>
	<div class="form-row">
		<div class="col-7">
			<div class="alert alert-danger ml-2" role="alert" id="alert">
				{{ __('trash.form_error_message' )}}
				<button type="button" class="close" onclick="close_alert('alert')">
    			<span aria-hidden="true">&times;</span>
  				</button>
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="col-sm-5">
			<input type="text" id="name" name="name" class="form-control ml-2 mb-2" placeholder="{{ __('trash.name') }}" required>
		</div>
		<div class="col-sm-5">
			<input type="number" id="max_capacity" name="max_capacity" class="form-control ml-2" placeholder="{{ __('trash.max_capacity') }}" required>
		</div>
		<div class="col-sm-5">
			<input type="number" id="cur_capacity" name="cur_capacity" class="form-control ml-2 mb-2" placeholder="{{ __('trash.cur_capacity') }}" required>
		</div>
	</div>
	<div class="form-row">
		<input type="submit" name="submit" value="{{ __('trash.submit') }}" class="btn btn-primary ml-3">
	</div>
</form>
<h1 style="font-weight:bold" class="ml-3 mt-5">{{ __('trash.title_edit') }}</h1>
<form method="GET" action="garbage_bin_edit" class="needs-validation"  novalidate>
	<div class="form-row">
		<div class="col-7">
			<div class="alert alert-danger ml-2" role="alert" id="alert_new">
				{{ __('trash.form_error_message' )}}
				<button type="button" class="close" onclick="close_alert('alert_new')">
    			<span aria-hidden="true">&times;</span>
  				</button>
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="col-sm-5">
			<input type="text" name="name" class="form-control ml-2 mb-2" placeholder="{{ __('trash.name') }}" required>
		</div>
		<div class="col-sm-5">
			<input type="text" name="new_name" class="form-control ml-2 mb-2" placeholder="{{ __('trash.new_o') }}{{ __('trash.name') }}">
		</div>
	</div>
	<div class="form-row">
		<div class="col-sm-5">
			<input type="number" id="max_capacity_new" name="max_capacity" class="form-control ml-2" placeholder="{{ __('trash.new') }}{{ __('trash.max_capacity') }}">
		</div>
		<div class="col-sm-5">
			<input type="number" id="cur_capacity_new" name="cur_capacity" class="form-control ml-2 mb-2" placeholder="{{ __('trash.new') }}{{ __('trash.cur_capacity') }}" required>
		</div>
	</div>
	<div class="form-row">
		<input type="submit" name="submit" value="{{ __('trash.submit') }}" class="btn btn-primary ml-3">
	</div>
</form>
@endsection
<script>
function close_alert(id)
{
	var alert = $('#'+id);
	alert.hide();
}
(function () 
{
	'use strict';
	window.addEventListener('load', function()
	{
		var forms = document.getElementsByClassName('needs-validation');
		var validation = Array.prototype.filter.call(forms, function(form)
		{
			form.addEventListener('submit', function(event)
			{
				var max = $('#max_capacity').val();
				var cur = $('#cur_capacity').val();
				var maxnew = $("#max_capacity_new").val();
				var curnew = $('#cur_capacity_new').val();
				var alert = $('#alert');
				var alert_new = $('#alert_new');
				if (form.checkValidity() === false)
				{
					event.preventDefault();
					event.stopPropagation();
				}
				if (cur > max)
		        {
		        	alert.show();
		        	event.preventDefault();
					event.stopPropagation();
		        }
		        else if(curnew > maxnew)
		        {
		        	alert_new.show();
		        	event.preventDefault();
					event.stopPropagation();
		        }
				form.classList.add('was-validated');
			}, false);
		});
	}, false);
})();
</script>