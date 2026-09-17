@extends('master')

@section('content')

<div class="container py-5">

    <!-- Top Header Bar -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
            <h2 class="fw-bold mb-0">Product Management</h2>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ url('/admin') }}" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Dashboard
            </a>
            <a href="{{ url('/admin/products/create') }}" class="btn btn-primary rounded-pill px-3 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Add New Product
            </a>
        </div>
    </div>

    <!-- Flash Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Products Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 px-4 border-0 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0 text-dark">
                All Products <span class="badge bg-primary rounded-pill ms-2">{{ $products->count() }}</span>
            </h5>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 70px;">ID</th>
                        <th style="width: 90px;">Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th style="max-width: 250px;">Description</th>
                        <th class="text-end pe-4" style="width: 160px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <!-- Product ID -->
                            <td class="ps-4 text-muted fw-semibold">#{{ $product->id }}</td>

                            <!-- Product Image -->
                            <td>
                                @if(!empty($product->gallery))
                                    <img src="{{ $product->gallery }}" 
                                         alt="{{ $product->name }}" 
                                         class="rounded-3 border object-fit-cover shadow-sm" 
                                         style="width: 55px; height: 55px;"
                                         onerror="this.onerror=null;this.src='https://placehold.co/55x55?text=No+Img';">
                                @else
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center border" style="width: 55px; height: 55px;">
                                        <i class="bi bi-image text-muted fs-4"></i>
                                    </div>
                                @endif
                            </td>

                            <!-- Name -->
                            <td>
                                <span class="fw-bold text-dark d-block">{{ $product->name }}</span>
                                <small class="text-muted">ID: {{ $product->id }}</small>
                            </td>

                            <!-- Category -->
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info fw-semibold px-2 py-1 rounded-pill">
                                    {{ $product->category }}
                                </span>
                            </td>

                            <!-- Price -->
                            <td class="fw-bold text-success">
                                ₹{{ number_format($product->price, 2) }}
                            </td>

                            <!-- Description -->
                            <td>
                                <small class="text-muted d-inline-block text-truncate" style="max-width: 240px;" title="{{ $product->description }}">
                                    {{ $product->description }}
                                </small>
                            </td>

                            <!-- Action Buttons -->
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-1">
                                    <!-- Edit Button -->
                                    <a href="{{ url('/admin/products/edit/' . $product->id) }}" 
                                       class="btn btn-sm btn-outline-primary rounded-3" 
                                       title="Edit Product">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- Delete Button with Form -->
                                    <form action="{{ url('/admin/products/delete/' . $product->id) }}" 
                                          method="POST" 
                                          class="d-inline m-0"
                                          onsubmit="return confirm('Kya aap sach me ye product delete karna chahte hain?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-outline-danger rounded-3" 
                                                title="Delete Product">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="py-4">
                                    <i class="bi bi-box2 text-muted" style="font-size: 3rem;"></i>
                                    <h5 class="fw-semibold mt-3 text-secondary">Koi Product Nahi Mila</h5>
                                    <p class="text-muted mb-3">Naya product add karne ke liye neeche button par click karein.</p>
                                    <a href="{{ url('/admin/products/create') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                        <i class="bi bi-plus-lg me-1"></i> Add Product
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection