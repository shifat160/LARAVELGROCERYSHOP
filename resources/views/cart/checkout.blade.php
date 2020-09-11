@extends('layouts.app')

@section('content')

<h2 class="text-center">Checkout Page</h2>

<div class="row mt-5">
	<div class="col-md-12 text-center">
		<h3 class="mb-5">
			Shipping Information
		</h3>
	</div>

</div>

<div class="row">	
	<div class="col-md-12 d-flex justify-content-center">
		<form action="{{ route('orders.store') }}" method="post" class="">
				@csrf
			<div class="form-group">
				<label for="">Full Name</label>
				<input type="text" name="shipping_fullname" id="" class="form-control">
			</div>

			<div class="form-group">
				<label for="">State</label>
				<input type="text" name="shipping_state" id="" class="form-control">
			</div>

			<div class="form-group">
				<label for="">City</label>
				<input type="text" name="shipping_city" id="" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Zip</label>
				<input type="number" name="shipping_zipcode" id="" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Address</label>
				<input type="text" name="shipping_address" id="" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Mobile</label>
				<input type="text" name="shipping_phone" id="" class="form-control">
			</div>

			<h4>Choose your Payment Method</h4>

			<div class="form-check">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" name="payment_method" id="" value="cash_on_delivery">
					Cash On Delivery
				</label>

			</div>

			<div class="form-check">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" name="payment_method" id="" value="paypal">
					Paypal
				</label>

			</div>


			<button type="submit" class="mt-3 btn btn-primary">Place Order</button>
		</form>
	</div>
</div>
		
		{{-- @if ($errors->any()) @foreach ($errors->all() as $error)
			{{ $error }}
		@endforeach @endif --}}

@endsection
