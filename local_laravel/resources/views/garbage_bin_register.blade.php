@extends('layouts.app')

@section('content')
<h1 style="font-weight:bold" class="ml-3">Add new garbage bin</h1>
<form method="GET" action="garbage_bin_table" class="needs-validation"  novalidate>
	<div class="form-row">
		<div class="col-sm-5">
			<input type="text" name="name" class="form-control ml-2 mb-2" placeholder="Name" required>
		</div>
		<div class="col-sm-5">
			<input type="number" name="max_capacity" class="form-control ml-2" placeholder="Maximum Capacity" required>
		</div>
		<div class="col-sm-5">
			<input type="number" name="cur_capacity" class="form-control ml-2 mb-2" placeholder="Current Capacity" required>
		</div>
	</div>
	<div class="form-row">
		<input type="submit" name="submit" value="Submit" class="btn btn-primary ml-3">
	</div>
</form>
<h1 style="font-weight:bold" class="ml-3 mt-5">Edit garbage bin</h1>
<form method="GET" action="garbage_bin_edit">
	<div class="form-row">
		<div class="col-sm-5">
			<input type="text" name="name" class="form-control ml-2 mb-2" placeholder="Name" required>
		</div>
		<div class="col-sm-5">
			<input type="text" name="new_name" class="form-control ml-2 mb-2" placeholder="New name">
		</div>
		<div class="col-sm-5">
			<input type="number" name="max_capacity" class="form-control ml-2" placeholder="New maximum Capacity">
		</div>
		<div class="col-sm-5">
			<input type="number" name="cur_capacity" class="form-control ml-2 mb-2" placeholder="New current Capacity">
		</div>
	</div>
	<div class="form-row">
		<input type="submit" name="submit" value="Submit" class="btn btn-primary ml-3">
	</div>
</form>
@endsection
<script>
(function()
{
  'use strict';
  window.addEventListener('load', function()
  {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form)
	{
      form.addEventListener('submit', function(event)
	  {
        if (form.checkValidity() === false)
		{
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>