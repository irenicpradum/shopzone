@extends('master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Now - ShopZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        body {
            background: #f8f9fa;
            color: #212529;
        }
        .order-wrapper {
            max-width: 1100px;
            margin: 50px auto;
        }
        .order-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            margin-bottom: 20px;
        }
        .product-image {
            width: 110px;
            height: 110px;
            object-fit: contain;
            border-radius: 12px;
            background: #f1f3f5;
            padding: 10px;
        }
        .product-name {
            font-size: 20px;
            font-weight: 600;
        }
        .product-description {
            color: #6c757d;
            margin-top: 5px;
        }
        .product-price {
            color: #0d6efd;
            font-size: 20px;
            font-weight: 700;
        }
        .summary-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 25px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            position: sticky;
            top: 90px;
        }
        .summary-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .total-price {
            color: #0d6efd;
            font-size: 28px;
            font-weight: 800;
        }
        .place-order-btn {
            width: 100%;
            padding: 13px;
            font-size: 17px;
            font-weight: 600;
            border-radius: 10px;
        }
        .secure-box {
            background: #f1f8ff;
            border-radius: 10px;
            padding: 12px;
            color: #0d6efd;
            font-size: 14px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
<div class="container order-wrapper">
    <div class="mb-4">
        <h1 class="fw-bold">Order Summary</h1>
        <p class="text-muted">
            Review your products before placing your order.
        </p>
    </div>
    <div class="row g-4">
        <div class="col-lg-8">
            @php
                $total = 0;
            @endphp
            @foreach($cart as $item)
                @php
                    $total += $item->product->price;
                @endphp
                <div class="order-card">
                    <div class="row align-items-center g-3">
                        <div class="col-md-2 text-center">
                        <img  src="{{ $item->product->gallery }}"  class="product-image" alt="{{ $item->product->name }}">
                        </div>
                        <div class="col-md-7">
                            <div class="product-name">
                                {{ $item->product->name }}
                            </div>
                            <div class="product-description">
                                {{ $item->product->description }}
                            </div>
                            <div class="mt-2">
                                <span class="badge bg-light text-dark">
                                    Quantity: 1
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 text-md-end">
                            <div class="product-price">
                                ₹{{ number_format($item->product->price) }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-4">
            <div class="summary-card">
                <div class="summary-title">
                    <i class="bi bi-receipt me-2"></i>
                    Order Summary
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Items</span>
                    <span>{{ count($cart) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Subtotal</span>
                    <span>₹{{ number_format($total) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Delivery</span>
                    <span class="text-success fw-semibold">
                        FREE
                    </span>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="fw-bold fs-5">
                        Total
                    </span>
                    <span class="total-price">
                        ₹{{ number_format($total) }}
                    </span>
                </div>
                <!-- form-->
                <form action="{{ url('/orderplace') }}" method="POST">
                   @csrf
                     <div class="mb-3">
                              <label class="form-label fw-semibold">Your Name & Delivery Address</label>
                              <textarea name="address" class="form-control" rows="3" placeholder="Enter your complete delivery address" required></textarea>
                     </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Method</label>
                       <div>
                             <input type="radio" name="payment_method"value="Online Payment" required>
                             Online Payment
                       </div>

                        <div>
                            <input type="radio" name="payment_method" value="Cash On Delivery" required>
                            Cash On Delivery
                        </div>
                  </div>
                    
                   <button type="submit" class="btn btn-primary place-order-btn">
                       <i class="bi bi-check-circle me-2"></i>
                       Place Order
                   </button>
             </form>
             <!-- form end -->
                <div class="secure-box">
                    <i class="bi bi-shield-check me-2"></i>
                    Your order information is secure and protected.
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection