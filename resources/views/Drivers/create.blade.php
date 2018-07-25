@extends('layouts.app')
@section('content')
<div class="container" style=" margin-top: 3em; ">
	<div class="row justify-content-center">
		<div class="col-md-6" style="background-color: white; padding: 3em; border-radius: 10px">
			<form method="POST" action="">
				@csrf
				<div class="form-group">
					<input class="form-control" type="" name="" placeholder="Vehicle ">
				</div>
				<div class="form-group">
					<input class="form-control" type="" name="" placeholder="Vehicle Model">
				</div>
				<div class="form-group">
					<input class="form-control" type="" name="" placeholder="Vehicle Type">
				</div>
				<button class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection