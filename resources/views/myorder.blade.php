@extends('master')

@section('content')

<div class="container py-5">
    <div class="mb-4">
        <h1 class="fw-bold">My Orders</h1>
        <p class="text-muted">
            View your order history and order details.
        </p>
    </div>
    @if($orders->count() > 0)
        @foreach($orders as $order)
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            <img 
                                src="{{ $order->product->gallery }}"
                                alt="{{ $order->product->name }}"
                                style="width:100px;height:100px;object-fit:contain;"
                                class="img-fluid"
                            >
                        </div>
                        <div class="col-md-5">
                            <h4 class="fw-bold">
                                {{ $order->product->name }}
                            </h4>
                            <p class="text-muted mb-1">
                                {{ $order->product->description }}
                            </p>
                            <h5 class="text-primary">
                                ₹{{ number_format($order->product->price) }}
                            </h5>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-2">
                                <strong>Order ID:</strong>
                                #{{ $order->id }}
                            </p>
                            <p class="mb-2">
                                <strong>Payment:</strong>
                                {{ $order->payment_method }}
                            </p>
                            <p class="mb-2">
                                <strong>Payment Status:</strong>
                                <span class="badge bg-success">
                                    {{ $order->payment_status }}
                                </span>
                            </p>
                            <p class="mb-2">
                                <strong>Order Status:</strong>
                                <span class="badge bg-warning text-dark">
                                    {{ $order->status }}
                                </span>
                            </p>
                            <p class="text-muted mb-0">
                                {{ $order->created_at->format('d M Y, h:i A') }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <strong>Delivery Address:</strong>
                        <p class="text-muted mb-0">
                            {{ $order->address }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center py-5">
            <i class="bi bi-box-seam"
               style="font-size:60px;color:#0d6efd;">
            </i>
            <h3 class="mt-3">
                No Orders Yet
            </h3>
            <p class="text-muted">
                You haven't placed any orders yet.
            </p>
            <a href="{{ url('/') }}" class="btn btn-primary">
                Continue Shopping
            </a>
        </div>
    @endif
</div>
@endsection