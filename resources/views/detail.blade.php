@extends('master')

@section('content')

<div class="container py-5">
    <div class="row align-items-center">
        <!-- Image -->
        <div class="col-md-5 mb-4 ">
            <div class="card border-2 border-info  shadow-lg rounded-4 p-3">
                <img
                    src="{{ $product->gallery }}"
                    alt="{{ $product->name }}"
                    class="img-fluid border-1 border-black"
                    style="height:350px; width:100%; object-fit:contain;"
                >
            </div>
        </div>
        <!-- Details -->
        <div class="col-md-6">
          <a  href="/"><!-- From Uiverse.io by cssbuttons-io --> 
                   <button class="button">Go Back</button></a>
           <br><br>
            <span class="badge bg-primary mb-3">
                {{ $product->category }}
            </span>
            <h1 class="fw-bold">
                {{ $product->name }}
            </h1>
            <div class="mb-3 text-warning">
                ★★★★★
                <span class="text-muted ms-2">
                    4.5 (120 Reviews)
                </span>
            </div>
            <h2 class="text-primary fw-bold">
                ₹{{ number_format($product->price) }}
            </h2>
            <p class="text-muted">
                {{ $product->description }}
            </p>
            <div class="d-flex gap-2 mt-4">
                <!-- form -->
             <form action="/add_to_cart" method="POST">
                @csrf
                <input 
                type="hidden" name="product_id" 
                value="{{ $product->id }}">
                
                <button class="btn btn-primary px-4">
                    <i class="bi bi-cart-plus me-2"></i>
                    Add to Cart
                </button>
             </form>
                <button class="btn btn-dark px-4">
                    Buy Now
                </button>
            </div>
            <hr class="my-4">
            <p>
                <i class="bi bi-truck text-primary me-2"></i>
                Free Delivery
            </p>
            <p>
                <i class="bi bi-shield-check text-primary me-2"></i>
                Secure Payment
            </p>
        </div>
    </div>
</div>
<style>
    /* From Uiverse.io by cssbuttons-io */ 
.button {
  display: inline-block;
  padding: 8px 16px;
  border: 1px solid #4f4f4f;
  border-radius: 4px;
  transition: all 0.2s ease-in;
  position: relative;
  overflow: hidden;
  font-size: 19px;
  cursor: pointer;
  color: black;
  z-index: 1;
  font-weight: 600;
}
.button:before {
  content: "";
  position: absolute;
  left: 50%;
  transform: translateX(-50%) scaleY(1) scaleX(1.25);
  top: 100%;
  width: 140%;
  height: 180%;
  background-color: rgba(0, 0, 0, 0.05);
  border-radius: 50%;
  display: block;
  transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -1;
}
.button:after {
  content: "";
  position: absolute;
  left: 55%;
  transform: translateX(-50%) scaleY(1) scaleX(1.45);
  top: 180%;
  width: 160%;
  height: 190%;
  background-color: #39bda7;
  border-radius: 50%;
  display: block;
  transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -1;
}
.button:hover {
  color: #ffffff;
  border: 1px solid #39bda7;
}
.button:hover:before {
  top: -35%;
  background-color: #39bda7;
  transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
}
.button:hover:after {
  top: -45%;
  background-color: #39bda7;
  transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
}
</style>
@endsection