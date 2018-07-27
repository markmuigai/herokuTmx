@extends('layouts.app')
@section('content')

@if($deliveries->count() == '0')
<div class="container text-center" style="padding: 5em">
	<h3>You have not received any delivery requests</h3>
</div>
@endif


@foreach (array_chunk($deliveries->all(), 3) as $deliveryRow)
<div class="container">	
    <div class="row">
        @foreach ($deliveryRow as $delivery)
         <div class="col-md-4 events">
				<div class="card text-white bg-primary mb-3" style="height: 14rem; margin:1em;">
					<div class="card-header">
						Delivery for {{$delivery->user->name}}
					</div>
					<div class="card-body">
					<p class="card-text">Pick up Location: {{$delivery->pickupAddress}}</p>
					<p class="card-text">Destination Location: {{$delivery->destAddress}}</p>
					<form action="" method="POST">
						@csrf
						<a href="#" type="submit" class="btn btn-warning">Accept delivery</a>	
					</form>
					
					</div>
				</div>
		 </div>
        @endforeach
    </div>
</div>
@endforeach
@endsection
