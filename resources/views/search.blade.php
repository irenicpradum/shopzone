@extends('master')
@section('content')
<!-- ================= TRENDING PRODUCTS ================= -->
<section class="container py-5">
    <!-- Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <span class="text-primary fw-semibold">
                Popular Now
            </span>
            <h2 class="fw-bold mb-0">
                Result for Products
            </h2>
        </div>
    </div>
    <!-- Products -->
    <div class="row g-4">
        @foreach($products as $product)
            <div class="col-6 col-md-4 col-lg-3 col-xl">
                <!-- Product Link -->
                <a
                    href="{{ url('detail/'.$product->id) }}"
                    class="text-decoration-none text-dark"
                >
                    <div class="text-center">
                        <!-- Image -->
                        <div
                            class="product-image mb-3 bg-black rounded-4"
                        >
                            <img
                                src="{{ $product->gallery }}"
                                alt="{{ $product->name }}"
                                class="img-fluid rounded-4"
                            >
                        </div>
                        <!-- Product Name -->
                        <h5 class="mb-0 fw-semibold">
                            {{ $product->name }}
                        </h5>
                        <!-- Category -->
                        <small class="text-muted">
                            {{ $product->category }}
                        </small>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>
<!-- ================= CSS ================= -->
<style>
    .product-image {
        height: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #000;
        overflow: hidden;
        transition: 0.3s ease;
    }
    .product-image img {
        width: 150px;
        height: 120px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    .product-image:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    .product-image:hover img {
        transform: scale(1.08);
    }
    .carousel-item .card {
        transition: 0.3s ease;
    }
    .carousel-item .card:hover {
        transform: translateY(-5px);
    }
    @media (max-width: 576px) {
        .product-image {
            height: 110px;
        }
        .product-image img {
            width: 120px;
            height: 90px;

        }
        .carousel-item img {

            height: 200px !important;
        }
    }
</style>

@endsection