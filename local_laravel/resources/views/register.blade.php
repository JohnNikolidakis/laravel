@extends('layouts.app')
@section('content')
<div class="container">
	<form method="GET" action="table" class="needs-validation"  novalidate>
		<div class="form-row">
			<div class="col-sm-4 mt-3 ml-3">
				<input type="text" name="firstname" class="form-control" placeholder="First name" required>
			</div>
			<div class="col-sm-5 mt-3">
				<input type="text" name="lastname" class="form-control" placeholder="Last name" required>
			</div>
		</div>
		<div class="form-row">
			<div class="col-sm-5 mt-3 ml-3">
				<input type="password" name="password" class="form-control" placeholder="Password" required>
			</div>
			<div class="col-sm-4 mt-3">
				<input type="password" name="confirmpassword" class="form-control" placeholder="Confirm password" required>
			</div>
		</div>
		<div class="form-row ">
			<div class="col-sm-5 mt-3 ml-3">
				<input type="text" name="email" class="form-control was-validated" placeholder="E-mail" required>
			</div>
			<div class="col-sm-4 mt-3">
				<input type="text" name="phonenumber" class="form-control" placeholder="Phone number" required>
			</div>
		</div>
		<div class="form-row">
			<div class="col-sm-3 mt-3 ml-3">
				<input type="text" name="city" class="form-control" placeholder="City" required>
			</div>
			<div class="col-sm-3 mt-3">
				<input type="text" name="address" class="form-control" placeholder="Address" required>
			</div>
			<div class="col-sm-3 mt-3">
				<input type="text" name="zip" class="form-control" placeholder="Zip Code" required>
			</div>
		</div>
		<div class="form-row">
			<input type = "submit" name="submit" value="submit" class="btn btn-primary mt-3 ml-3">
		</div>
	</form>
</div>
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