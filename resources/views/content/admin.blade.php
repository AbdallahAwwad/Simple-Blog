@extends('master')


@section('content')
<div class="col-md-8">

<h4>Control Panel</h4>
<br>
<h5>-List Of Users</h5>

<div>
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>User</th>
			<th>Editor</th>
			<th>Admin</th>
		</tr>

		@foreach($users as $user)
		<form method="POST" action="/add-role">
		{{ csrf_field() }}

		<input type="hidden" name="email" value="{{ $user->email }}">
		<tr>
			<th>{{ $user->id }}</th>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>
				<input type="checkbox" name="role_user" onChange="this.form.submit()" {{ $user->hasRole('User') ? 'checked' : ' ' }}>
			</td>
			<td>
				<input type="checkbox" name="role_editor" onChange="this.form.submit()" {{ $user->hasRole('Editor') ? 'checked' : ' ' }}>
			</td>
			<td>
				<input type="checkbox" name="role_admin" onChange="this.form.submit()" {{ $user->hasRole('Admin') ? 'checked' : ' ' }}>
			</td>
		</tr>
		</form>
		@endforeach

	</table>
</div>

</div>
@stop