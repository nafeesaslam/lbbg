@extends('admin/layouts.app')
@section('custom_css')
	<style type="text/css">
		.perms{
			list-style: none;
		}
		ul.perms li {
			display: inline;
			float: left;
			margin-left: 5px;
			font-size: 20px;
			min-width: 200px;
		}
		.perms label{
			min-width: 200px;
			min-height: 40px;
			padding: 10px 0  10px 0;
		}
		.perms label input{
				text-align: left !important;
		}
	</style>
@endsection
@section('content')
<div class="container">
	<center><h2>Permissions</h2></center>
	
	<form method="post" action="{{ route('perm.store') }}">
	{{ csrf_field() }}

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<input type="text" name="name" class="form-control" placeholder="Enter a Role" >
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="perms">
				@foreach($roles as $r)
					<li><label class="badge badge-info"><input type="checkbox" name="roles[]" value="{{ $r->id }}">  {{ ucfirst(str_replace('_', ' ', $r->role)) }}</label> </li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="col-md-12">
		<input type="submit" name="submit" class="btn btn-success pull-right" value="Save">
	</div>

	</form>


</div>
@endsection
