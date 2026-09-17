@extends('master')

@section('content')

<div class="container py-5">

    <!-- Top Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
            <h2 class="fw-bold mb-0">Order Management</h2>
        </div>

        <a href="{{ url('/admin') }}" class="btn btn-outline-secondary rounded-pill px-3">
            <i class="bi bi-arrow-left me-1"></i> Dashboard
        </a>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Orders Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 border-0">
            <h5 class="fw-bold mb-0 text-dark">
                Customer Orders <span class="badge bg-success rounded-pill ms-2">{{ $orders->count() }}</span>
            </h5>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Order ID</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Delivery Address</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td class="ps-4 fw-bold">#{{ $order->id }}</td>

                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ $order->product_gallery }}" 
                                         alt="{{ $order->product_name }}" 
                                         class="rounded-3 border object-fit-cover" 
                                         style="width: 45px; height: 45px;"
                                         onerror="this.onerror=null;this.src='https://placehold.co/45x45?text=No+Img';">
                                    <div>
                                        <span class="fw-semibold d-block text-truncate" style="max-width: 150px;">{{ $order->product_name }}</span>
                                        <small class="text-success fw-bold">₹{{ number_format($order->product_price, 2) }}</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="d-block fw-semibold">{{ $order->user_name }}</span>
                                <small class="text-muted">{{ $order->user_email }}</small>
                            </td>

                            <td>
                                <small class="text-muted d-inline-block text-truncate" style="max-width: 180px;" title="{{ $order->address }}">
                                    {{ $order->address }}
                                </small>
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border px-2 py-1">
                                    {{ strtoupper($order->payment_method) }}
                                </span>
                            </td>

                            <td>
                                <span class="badge rounded-pill px-2 py-1 
                                    @if($order->status == 'Delivered') bg-success 
                                    @elseif($order->status == 'Cancelled') bg-danger 
                                    @elseif($order->status == 'Shipped') bg-info 
                                    @else bg-warning text-dark @endif">
                                    {{ $order->status }}
                                </span>
                            </td>

                            <td class="text-end pe-4">
                                <form action="{{ url('/admin/orders/update/' . $order->id) }}" method="POST" class="d-inline-flex gap-1 align-items-center">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm rounded-3" style="width: 120px;">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>

                                    <input type="hidden" name="payment_status" value="{{ $order->payment_status }}">

                                    <button type="submit" class="btn btn-sm btn-primary rounded-3" title="Save Status">
                                        <i class="bi bi-check2"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="bi bi-cart-x text-muted" style="font-size: 3rem;"></i>
                                <h5 class="fw-semibold mt-3 text-secondary">Abhi tak koi orders nahi hain</h5>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection