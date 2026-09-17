@extends('master')

@section('content')

@if(session('success'))
    <div class="glass-alert alert alert-success alert-dismissible fade show m-3" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- ================= PRODUCT CAROUSEL ================= -->
<div class="glass-page">
    <div class="glass-orb orb-1"></div>
    <div class="glass-orb orb-2"></div>
    <div class="glass-orb orb-3"></div>
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="container py-5">
            <!-- Heading -->
            <div class="text-center mb-5">
                <span class="glass-badge">
                    <i class="bi bi-stars me-2"></i> Featured Products
                </span>
                <h1 class="glass-heading mt-3">Explore Our Products</h1>
                <p class="glass-subtitle">Discover premium products at the best prices</p>
            </div>
            <!-- Carousel -->
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                <!-- Indicators -->
                <div class="carousel-indicators glass-indicators">
                    @foreach($products as $key => $product)
                        <button type="button"
                            data-bs-target="#productCarousel"
                            data-bs-slide-to="{{ $key }}"
                            class="{{ $key == 0 ? 'active' : '' }}"
                            aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $key + 1 }}">
                        </button>
                    @endforeach
                </div>
                <!-- Carousel Items -->
                <div class="carousel-inner">
                    @foreach($products as $key => $product)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                                    <!-- Product Card -->
                                    <a href="{{ url('detail/'.$product->id) }}" class="text-decoration-none">
                                        <div class="glass-product-card">
                                            <!-- Product Image -->
                                            <div class="glass-product-image">
                                                <img src="{{ $product->gallery }}" alt="{{ $product->name }}">
                                                <span class="glass-category">
                                                    <i class="bi bi-tag me-1"></i>
                                                    {{ $product->category }}
                                                </span>
                                                <span class="glass-wishlist">
                                                    <i class="bi bi-heart"></i>
                                                </span>
                                            </div>
                                            <!-- Product Details -->
                                            <div class="glass-product-body">
                                                <div class="text-center">
                                                    <h2 class="glass-product-name">{{ $product->name }}</h2>

                                                    <p class="glass-description">
                                                        {{ $product->description }}
                                                    </p>
                                                    <!-- Rating -->
                                                    <div class="glass-rating">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-half"></i>
                                                        <span>4.5/5</span>
                                                    </div>
                                                    <!-- Price -->
                                                    <div class="glass-price">
                                                        ₹{{ number_format($product->price) }}
                                                    </div>
                                                    <!-- Buttons -->
                                                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                                                        <span class="glass-btn glass-btn-primary">
                                                            <i class="bi bi-cart-plus me-2"></i>
                                                            Add to Cart
                                                        </span>
                                                        <span class="glass-btn glass-btn-outline">
                                                            <i class="bi bi-eye me-2"></i>
                                                            View Details
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Previous -->
                <button class="carousel-control-prev glass-carousel-btn"
                    type="button"
                    data-bs-target="#productCarousel"
                    data-bs-slide="prev">
                    <span class="glass-arrow">
                        <i class="bi bi-chevron-left"></i>
                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <!-- Next -->
                <button class="carousel-control-next glass-carousel-btn"
                    type="button"
                    data-bs-target="#productCarousel"
                    data-bs-slide="next">
                    <span class="glass-arrow">
                        <i class="bi bi-chevron-right"></i>
                    </span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-- ================= TRENDING PRODUCTS ================= -->
    <section class="container py-5">
        <!-- Heading -->
        <div class="text-center mb-5">
            <span class="glass-badge">
                <i class="bi bi-fire me-2"></i> Popular Now
            </span>
            <h2 class="glass-section-heading mt-3">Trending Products</h2>
            <p class="glass-subtitle">Our most popular products right now</p>
        </div>
        <!-- Products -->
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ url('detail/'.$product->id) }}" class="text-decoration-none">
                        <div class="trending-glass-card">
                            <!-- Image -->
                            <div class="trending-image">
                                <img src="{{ $product->gallery }}" alt="{{ $product->name }}">
                                <span class="trending-heart">
                                    <i class="bi bi-heart"></i>
                                </span>
                            </div>
                            <!-- Details -->
                            <div class="trending-details">
                                <small class="trending-category">
                                    {{ $product->category }}
                                </small>
                                <h5 class="trending-name">
                                    {{ $product->name }}
                                </h5>
                                <div class="trending-price">
                                    ₹{{ number_format($product->price) }}
                                </div>
                                <div class="trending-rating">
                                    <i class="bi bi-star-fill"></i>
                                    <span>4.5</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</div>
<!-- ================= CSS ================= -->
<style>
.glass-page {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    background:
        radial-gradient(circle at 10% 20%, rgba(13,110,253,.18), transparent 30%),
        radial-gradient(circle at 90% 10%, rgba(111,66,193,.20), transparent 30%),
        radial-gradient(circle at 50% 90%, rgba(13,202,240,.15), transparent 30%),
        linear-gradient(135deg,#eef2ff,#f8f9fa,#e9f5ff);
}

.glass-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(70px);
    opacity: .45;
    pointer-events: none;
}

.orb-1 {
    width: 300px;
    height: 300px;
    background: #6f42c1;
    top: 5%;
    left: -100px;
}

.orb-2 {
    width: 350px;
    height: 350px;
    background: #0d6efd;
    top: 35%;
    right: -150px;
}

.orb-3 {
    width: 250px;
    height: 250px;
    background: #20c997;
    bottom: 5%;
    left: 30%;
}

.glass-alert {
    position: fixed;
    z-index: 9999;
    top: 15px;
    right: 15px;
    min-width: 300px;
    border: 1px solid rgba(255,255,255,.5);
    background: rgba(255,255,255,.65);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    box-shadow: 0 15px 40px rgba(0,0,0,.12);
    border-radius: 16px;
}

.glass-badge {
    display: inline-flex;
    align-items: center;
    padding: 9px 18px;
    border-radius: 50px;
    color: #0d6efd;
    font-size: 14px;
    font-weight: 600;
    background: rgba(255,255,255,.45);
    border: 1px solid rgba(255,255,255,.65);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    box-shadow: 0 8px 25px rgba(0,0,0,.08);
}

.glass-heading {
    font-size: clamp(2.2rem,5vw,4rem);
    font-weight: 800;
    color: #111827;
    letter-spacing: -1.5px;
}

.glass-section-heading {
    font-size: 2.5rem;
    font-weight: 800;
    color: #111827;
}

.glass-subtitle {
    color: #6b7280;
    font-size: 16px;
}

.glass-product-card {
    position: relative;
    overflow: hidden;
    border-radius: 30px;
    background: rgba(255,255,255,.40);
    border: 1px solid rgba(255,255,255,.65);
    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);
    box-shadow: 0 25px 70px rgba(31,38,135,.15),inset 0 1px 0 rgba(255,255,255,.7);
    transition: all .4s ease;
}

.glass-product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 35px 80px rgba(31,38,135,.20),inset 0 1px 0 rgba(255,255,255,.8);
}

.glass-product-image {
    position: relative;
    height: 330px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: rgba(255,255,255,.20);
}

.glass-product-image img {
    width: 75%;
    height: 85%;
    object-fit: contain;
    filter: drop-shadow(0 20px 20px rgba(0,0,0,.15));
    transition: transform .5s ease;
}

.glass-product-card:hover .glass-product-image img {
    transform: scale(1.08);
}

.glass-category {
    position: absolute;
    top: 20px;
    left: 20px;
    padding: 8px 15px;
    border-radius: 50px;
    color: #fff;
    font-size: 13px;
    background: rgba(0,0,0,.45);
    border: 1px solid rgba(255,255,255,.25);
    backdrop-filter: blur(10px);
}

.glass-wishlist {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: #fff;
    background: rgba(255,255,255,.25);
    border: 1px solid rgba(255,255,255,.5);
    backdrop-filter: blur(15px);
    font-size: 19px;
    transition: .3s ease;
}

.glass-wishlist:hover {
    background: rgba(220,53,69,.85);
    transform: scale(1.1);
}

.glass-product-body {
    padding: 35px;
    background: rgba(10,15,30,.78);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-top: 1px solid rgba(255,255,255,.12);
}

.glass-product-name {
    color: #fff;
    font-weight: 700;
    margin-bottom: 10px;
}

.glass-description {
    color: rgba(255,255,255,.70);
    max-width: 600px;
    margin: 0 auto 15px;
}

.glass-rating {
    margin-bottom: 15px;
    color: #ffc107;
}

.glass-rating span {
    color: #fff;
    margin-left: 8px;
    font-size: 14px;
}

.glass-price {
    font-size: 2.4rem;
    font-weight: 800;
    color: #63a4ff;
    margin-bottom: 20px;
}

.glass-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 25px;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all .3s ease;
}

.glass-btn-primary {
    color: #fff;
    background: linear-gradient(135deg,#0d6efd,#6610f2);
    box-shadow: 0 8px 25px rgba(13,110,253,.35);
}

.glass-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(13,110,253,.50);
}

.glass-btn-outline {
    color: #fff;
    border: 1px solid rgba(255,255,255,.35);
    background: rgba(255,255,255,.08);
    backdrop-filter: blur(10px);
}

.glass-btn-outline:hover {
    color: #fff;
    background: rgba(255,255,255,.18);
    transform: translateY(-3px);
}

.glass-carousel-btn {
    width: 9%;
}

.glass-arrow {
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: #fff;
    font-size: 20px;
    background: rgba(0,0,0,.35);
    border: 1px solid rgba(255,255,255,.35);
    backdrop-filter: blur(15px);
    transition: .3s ease;
}

.glass-arrow:hover {
    background: rgba(13,110,253,.8);
    transform: scale(1.1);
}

.glass-indicators button {
    width: 30px;
    height: 5px;
    border: 0;
    border-radius: 10px;
    background: rgba(0,0,0,.25);
}

.glass-indicators button.active {
    width: 45px;
    background: #0d6efd;
}

.trending-glass-card {
    position: relative;
    overflow: hidden;
    height: 100%;
    border-radius: 24px;
    background: rgba(255,255,255,.45);
    border: 1px solid rgba(255,255,255,.65);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    box-shadow: 0 15px 40px rgba(31,38,135,.10);
    transition: all .35s ease;
}

.trending-glass-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 55px rgba(31,38,135,.18);
}

.trending-image {
    height: 210px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    background: rgba(255,255,255,.25);
}

.trending-image img {
    width: 80%;
    height: 80%;
    object-fit: contain;
    transition: .4s ease;
}

.trending-glass-card:hover .trending-image img {
    transform: scale(1.1);
}

.trending-heart {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: #555;
    background: rgba(255,255,255,.45);
    border: 1px solid rgba(255,255,255,.7);
    backdrop-filter: blur(10px);
}

.trending-heart:hover {
    color: #dc3545;
}

.trending-details {
    padding: 20px;
}

.trending-category {
    color: #6b7280;
}

.trending-name {
    color: #111827;
    font-weight: 700;
    margin-top: 5px;
}

.trending-price {
    color: #0d6efd;
    font-size: 20px;
    font-weight: 800;
    margin-top: 10px;
}

.trending-rating {
    color: #ffc107;
    font-size: 14px;
    margin-top: 5px;
}

.trending-rating span {
    color: #6b7280;
    margin-left: 4px;
}

@media (max-width:768px) {
    .glass-product-image { height:250px; }
    .glass-product-body { padding:25px 18px; }
    .glass-product-name { font-size:1.5rem; }
    .glass-price { font-size:2rem; }
    .glass-carousel-btn { width:7%; }
    .glass-arrow { width:40px; height:40px; }
}

@media (max-width:576px) {
    .glass-heading { font-size:2.2rem; }
    .glass-section-heading { font-size:2rem; }
    .glass-product-image { height:210px; }
    .glass-product-image img { width:85%; height:80%; }
    .glass-product-body { padding:25px 15px; }
    .glass-description { font-size:14px; }
    .glass-price { font-size:1.8rem; }
    .trending-image { height:150px; }
    .trending-details { padding:14px; }
    .trending-name { font-size:15px; }
    .trending-price { font-size:17px; }
}
</style>

@endsection