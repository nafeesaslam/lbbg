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
	<center><h2>Roles</h2></center>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th><a href="{{ route('perm.create') }}" class="btn btn-info" type="">Add Role +</a></th>
						</tr>
						<tr>
							<th>Id</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($roles as $r)
						<tr>
							<td>{{ $r->id }}</td>
							<td>{{ $r->name }}</td>
							<td>
								<a href="{{route('perm.edit', $r->id)}}">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>
@endsection
