@extends('layout')

<div class="table-responsive">
	<table class="table table-bordered table-striped" style="text-align:center;">
		<tr>
			<td>First name</td>
			<td>Last name</td>
			<td>Password</td>
			<td>E-mail</td>
			<td>Phone number</td>
			<td>City</td>
			<td>Address</td>
			<td>Zip code</td>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->firstname }}</td>
			<td>{{ $user->lastname }}</td>
			<td>{{ $user->Password }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->phonenumber }}</td>
			<td>{{ $user->city }}</td>
			<td>{{ $user->address }}</td>
			<td>{{ $user->zipcode }}</td>
		</tr>
		@endforeach
	</table>
</div>
</body>

</html>