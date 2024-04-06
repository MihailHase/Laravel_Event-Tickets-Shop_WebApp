@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4">Coșul de cumpărături</h2>

        @if(count($cartItems) > 0)
            <form action="{{ route('update-cart') }}" method="post">
                @csrf
                <ul class="list-group mt-3">
                    @foreach ($cartItems as $cartItem)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Tip bilet:</strong> {{ $cartItem->type }},
                                <strong>Preț:</strong> {{ $cartItem->price }},
                                <strong>Cantitate:</strong>
                                <input type="number" name="quantity[{{ $cartItem->id }}]"
                                       value="{{ $cartItem->quantity }}" min="1" class="form-control"
                                       style="width: 70px;">
                            </div>
                            <div>
                                <button type="submit" name="action" value="update" class="btn btn-info btn-sm">Update
                                </button>
                                <a href="{{ route('delete-from-cart', $cartItem->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </form>

            <div class="mt-3">
                <form action="{{ route('empty-cart') }}" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-warning">Empty cart</button>
                </form>

                <form action="{{ route('stripe.checkout') }}" method="post" class="d-inline">
                    @csrf
                    <!-- Form content -->
                    <button type="submit" class="btn btn-success ml-2">Proceed to Checkout</button>
                </form>
            </div>
        @else
            <p class="mt-3">Coșul de cumpărături este gol.</p>
        @endif
    </div>
@endsection
