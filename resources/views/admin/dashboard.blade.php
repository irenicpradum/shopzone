@extends('master')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Admin Dashboard</h2>
            <p class="text-muted mb-0">Welcome to ShopZone Admin Panel</p>
        </div>

        <a href="{{ url('/') }}" class="btn btn-outline-primary rounded-pill">
            <i class="bi bi-shop me-2"></i>View Website
        </a>
    </div>

    <div class="row g-4">

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Products</p>
                            <h2 class="fw-bold mb-0">{{ $products }}</h2>
                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-box-seam fs-3 text-primary"></i>
                        </div>
                    </div>

                    <a href="{{ url('/admin/products') }}" class="btn btn-sm btn-outline-primary rounded-pill mt-4">
                        Manage Products
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Orders</p>
                            <h2 class="fw-bold mb-0">{{ $orders }}</h2>
                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-cart-check fs-3 text-success"></i>
                        </div>
                    </div>

                    <a href="{{ url('/admin/orders') }}" class="btn btn-sm btn-outline-success rounded-pill mt-4">
                        Manage Orders
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-2">Total Users</p>
                            <h2 class="fw-bold mb-0">{{ $users }}</h2>
                        </div>

                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-people fs-3 text-warning"></i>
                        </div>
                    </div>

                    <a href="{{ url('/admin/users') }}" class="btn btn-sm btn-outline-warning rounded-pill mt-4">
                        Manage Users
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-4 mt-2">

        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Quick Actions
                    </h5>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <a href="{{ url('/admin/products/create') }}" class="btn btn-light border w-100 py-3 text-start rounded-3">
                                <i class="bi bi-plus-circle text-primary me-2"></i>
                                Add New Product
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="{{ url('/admin/orders') }}" class="btn btn-light border w-100 py-3 text-start rounded-3">
                                <i class="bi bi-bag-check text-success me-2"></i>
                                View Orders
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="{{ url('/admin/users') }}" class="btn btn-light border w-100 py-3 text-start rounded-3">
                                <i class="bi bi-person-lines-fill text-warning me-2"></i>
                                View Users
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="#" class="btn btn-light border w-100 py-3 text-start rounded-3">
                                <i class="bi bi-bar-chart-line text-danger me-2"></i>
                                Sales Reports
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-grid me-2"></i>
                        Admin Panel
                    </h5>

                    <div class="list-group list-group-flush">

                        <a href="{{ url('/admin/products') }}" class="list-group-item list-group-item-action border-0 px-0 py-3">
                            <i class="bi bi-box-seam me-2 text-primary"></i>
                            Products
                        </a>

                        <a href="{{ url('/admin/orders') }}" class="list-group-item list-group-item-action border-0 px-0 py-3">
                            <i class="bi bi-cart-check me-2 text-success"></i>
                            Orders
                        </a>

                        <a href="{{ url('/admin/users') }}" class="list-group-item list-group-item-action border-0 px-0 py-3">
                            <i class="bi bi-people me-2 text-warning"></i>
                            Users
                        </a>

                        <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-3">
                            <i class="bi bi-credit-card me-2 text-danger"></i>
                            Payments
                        </a>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection