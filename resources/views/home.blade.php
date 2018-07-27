@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6" style="padding: 5em">
			<form action="" method="post" style="margin: 3em; padding: 3em; border-radius:10px " class="bg-primary">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" name="pickAddress" placeholder="Pickup Location">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" name="destAddress" placeholder="Destination Location">
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="packageInfo" placeholder="Package Description">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="pickupAddress" placeholder="Package Image">
				</div>
				
				<button class="btn btn-light">Get Driver</button>
			</form>
			<!-- @include('Drivers.yourDriver') -->
		</div>
		<div id="map" class="col-md-6 bg-white" style="height:50em; padding: 0px;">
			{!! Mapper::render() !!}	
		</div>	
	</div>
	


</div>
@endsection
