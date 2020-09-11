@extends('layouts.app')

@section('content')

<h2 class="text-center">Cart page</h2>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center bg-secondary mt-5">
            <table class="table table-borderless table-success table-hover table-responsive-sm">
                <caption class="bg-secondary">
                    <h2 class="text-bold text-white float-left ml-5">Total</h2>
                    <h2 class="float-right text-white mr-5">BDT ৳{{Cart::session(auth()->id())->getTotal() }}</h2>


                </caption>
                <thead>
                    <tr>
                        <th class="h2">Name</th>
                        <th class="h2">Unit Price</th>
                        <th class="h2">Total</th>
                        <th class="h2">Quantity</th>
                        <th class="h2">Remove</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $item)

                    <tr>
                        <td class="h4" scope="row">{{ $item->name }}</td>
                        <td class="h4">
                            {{ $item->price }}

                        </td>
                        <td class="h4">
                            BDT ৳{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
                        </td>

                        <td class="h4">
                            <form action="{{ route('cart.update', $item->id) }}">
                                <input class="" name="quantity" type="number" value="{{ $item->quantity }}">
                                <input type="submit" value="save">
                            </form>
                        </td>

                        <td class="h4">
                        <a href="{{ route('cart.destroy', $item->id) }}" class="text-danger"><i class="fas fa-trash text-danger">remove</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

             <a class="btn btn-success btn-block btn-lg" href="{{ route('cart.checkout') }}">
                Proceed to checkout
             </a>
        </div>
    </div>
</div>

@endsection