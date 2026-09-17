@extends('master')
@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">
        My Cart
    </h2>
      <a href="/ordernow"class="btn btn-success mb-4">Order Now</a>
    @if($cart->count() > 0)
        @foreach($cart as $item)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img 
                                src="{{ $item->product->gallery }}" 
                                class="img-fluid"
                                alt="{{ $item->product->name }}"
                            >
                        </div>
                        <div class="col-md-6">
                            <h4>
                                {{ $item->product->name }}
                            </h4>
                            <p class="text-muted">
                                {{ $item->product->description }}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <h5 class="text-primary">
                                ₹{{ $item->product->price }}
                            </h5>
                        </div>
                        <div class="col-md-2">
                            <a 
                                href="{{ url('detail/'.$item->product->id) }}"
                                class="btn btn-primary">
                                View Product
                            </a>
                              <a 
                                href="{{ url('/removecart/'.$item->id) }}"
                                class="btn btn-warning mt-4">
                                Remove From Cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center py-5">
            <i class="bi bi-cart-x fs-1 text-muted"></i>
            <h4 class="mt-3">
                Your cart is empty
            </h4>
            <a href="/" class="btn btn-primary mt-3">
                Continue Shopping
            </a>
        </div>
    @endif
</div>
@endsection