@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2>Producs</h2>

    <div class="row">
        @foreach ($allProducts as $product)
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch ">

            <div class="card mt-5 mb-5 shadow p-3 mb-5 bg-light rounded ">
                <div class="inner">
                    <img class="card-img-top " src="{{asset('mobile_1.png') }}" alt="Card image cap">
                </div>

                <div class="card-body">
                    <h3 class="card-title">{{$product->name}}</h3>
                    <p class="card-text">{{$product->description}}</p>
                </div>
                <div class="card-bdy">
                    <h4 class="card-text text-bold mb-2">BDT ৳{{$product->price}}</h4>
                </div>


                <div class="card-footer bg-success">
                  <h3><a href="{{ route('cart.add', $product->id) }}" class="card-link text-white">Add to cart</a></h3>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>

<div class="row">
    <div class="col-12 text-center">
        {{ $allProducts->links()}}
    </div>
</div>



@endsection
