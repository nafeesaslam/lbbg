@extends('admin/layouts.app')

@section('custom_css')

@endsection

@section('content')
	<div class="container">
		
		<form method="post" action="{{ route('uperms.save') }}">
			{{ csrf_field() }}

			<div class="row">
			<div class="col-md-12">
				<input type="text" name="id" value="{{ $user->id }}">
				<input type="text" readonly name="name" class="form-control" value="{{ $user->name }}">
				<select class="form-control" name="role">
					<option value="">Assign a role </option>
					@foreach($roles as $r)

						<option value="{{ $r->id }}">{{ $r->name }}</option>
					@endforeach
				</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="submit" name="submit" value="Save" class="btn btn-success pull-right">
					</div>
				</div>

		</form>

	</div>
@endsection