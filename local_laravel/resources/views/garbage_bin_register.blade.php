@extends('layouts.app')

@section('content')
<form method="GET" action="garbage_bin_table" class="needs-validation"  novalidate>
	<div class="form-row">
		<div class="col-sm-5">
			<input type="text" name="type" class="form-control" placeholder="Type" required>
		</div>
		<div class="col-sm-5">
			<input type="number" name="capacity" class="form-control" placeholder="Capacity" required>
		</div>
	</div>
	<div class="form-row">
		<input type="submit" name="submit" value="Submit" class="btn btn-primary">
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