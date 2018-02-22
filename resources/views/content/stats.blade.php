@extends('master')


@section('content')

<div class="col-md-8">

        <h1 class="page-header">
            Statistics
            <small>Website Statistics</small>
        </h1>

        <table class="table table-hover">
        	<tr>
        		<td>All Users</td>
        		<td>{{ $stats['users'] }}</td>
        	</tr>
        	<tr>
        		<td>All Posts</td>
        		<td>{{ $stats['posts'] }}</td>
        	</tr>
        	<tr>
        		<td>All Comments</td>
        		<td>{{ $stats['comments'] }}</td>
        	</tr>
        </table>
</div>
               
@stop