@extends('master')
@section('content')

<!-- ================= LIQUID GLASS LOGIN ================= -->
<div class="liquid-page">
    <div class="liquid-blob blob-1"></div>
    <div class="liquid-blob blob-2"></div>
    <div class="liquid-blob blob-3"></div>
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">
                <div class="liquid-card">
                    <div class="liquid-card-body">
                        <!-- Heading -->
                        <div class="text-center mb-4">
                            <div class="liquid-icon mb-3">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <h3 class="liquid-title mb-1">
                                Welcome Back
                            </h3>
                            <p class="liquid-subtitle mb-0">
                                Login to your account
                            </p>
                        </div>
                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="liquid-alert liquid-success alert alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                {{ session('success') }}
                                <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close">
                                </button>
                            </div>
                        @endif
                        <!-- Error Message -->
                        @if(session('error'))
                            <div class="liquid-alert liquid-error alert alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ session('error') }}
                                <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close">
                                </button>
                            </div>
                        @endif
                        <!-- Validation Errors -->
                        @if($errors->any())
                            <div class="liquid-alert liquid-error alert" role="alert">
                                @foreach($errors->all() as $error)
                                    <div>
                                        <i class="bi bi-exclamation-circle me-2"></i>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <form action="/login" method="POST" >
                            @csrf
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="liquid-label">
                                    Email Address
                                </label>
                                <div class="liquid-input-group">
                                    <span class="liquid-input-icon">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input
                                        type="email"
                                        class="liquid-input"
                                        id="email"
                                        name="email"
                                        placeholder="Enter your email"
                                        required
                                    >
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="liquid-label">
                                    Password
                                </label>
                                <div class="liquid-input-group">
                                    <span class="liquid-input-icon">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input
                                        type="password"
                                        class="liquid-input"
                                        id="password"
                                        name="password"
                                        placeholder="Enter your password"
                                        required
                                    >
                                </div>
                            </div>
                            <!-- Remember Me -->
                            <div class="mb-4 form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input liquid-check"
                                    id="remember"
                                >
                                <label class="form-check-label liquid-remember" for="remember">
                                    Remember Me
                                </label>
                            </div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button
                                    type="submit"
                                    class="liquid-login-btn"
                                >
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Login
                                </button>
                                <!-- Register Link -->
                                <div class="text-center mt-4">
                                    <p class="liquid-register-text mb-0">
                                        Don't have an account?
                                        <a href="{{ url('/register') }}"
                                           class="liquid-register-link">
                                            Create Account
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================= LIQUID GLASS CSS ================= -->
<style>
.liquid-page {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background:
        radial-gradient(circle at 15% 20%, rgba(13,110,253,.30), transparent 28%),
        radial-gradient(circle at 85% 15%, rgba(111,66,193,.28), transparent 30%),
        radial-gradient(circle at 50% 90%, rgba(32,201,151,.22), transparent 30%),
        linear-gradient(135deg,#e8f0ff,#f8f9ff,#eef7ff);
}

.liquid-blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(45px);
    opacity: .65;
    pointer-events: none;
    animation: liquidFloat 8s ease-in-out infinite;
}

.blob-1 {
    width: 280px;
    height: 280px;
    background: #0d6efd;
    top: 5%;
    left: 5%;
}

.blob-2 {
    width: 320px;
    height: 320px;
    background: #6f42c1;
    right: 5%;
    bottom: 10%;
    animation-delay: -3s;
}

.blob-3 {
    width: 220px;
    height: 220px;
    background: #20c997;
    left: 40%;
    bottom: -80px;
    animation-delay: -5s;
}

@keyframes liquidFloat {
    0%,100% {
        transform: translate(0,0) scale(1);
    }
    50% {
        transform: translate(20px,-25px) scale(1.08);
    }
}

.liquid-card {
    position: relative;
    overflow: hidden;
    border-radius: 32px;
    background: rgba(255,255,255,.32);
    border: 1px solid rgba(255,255,255,.65);
    backdrop-filter: blur(30px) saturate(150%);
    -webkit-backdrop-filter: blur(30px) saturate(150%);
    box-shadow:
        0 30px 80px rgba(31,38,135,.18),
        inset 0 1px 0 rgba(255,255,255,.85);
}

.liquid-card::before {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    top: -100px;
    right: -70px;
    border-radius: 50%;
    background: rgba(255,255,255,.35);
    filter: blur(5px);
}

.liquid-card-body {
    position: relative;
    padding: 45px 40px;
}

.liquid-icon {
    width: 68px;
    height: 68px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 22px;
    color: #fff;
    font-size: 27px;
    background: linear-gradient(135deg,#0d6efd,#6610f2);
    box-shadow:
        0 12px 30px rgba(13,110,253,.35),
        inset 0 1px 1px rgba(255,255,255,.5);
    transform: rotate(-3deg);
}

.liquid-title {
    color: #111827;
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -.5px;
}

.liquid-subtitle {
    color: #6b7280;
    font-size: 15px;
}

.liquid-label {
    display: block;
    margin-bottom: 8px;
    color: #374151;
    font-size: 14px;
    font-weight: 700;
}

.liquid-input-group {
    position: relative;
    display: flex;
    align-items: center;
    overflow: hidden;
    border-radius: 15px;
    background: rgba(255,255,255,.45);
    border: 1px solid rgba(255,255,255,.7);
    box-shadow:
        inset 0 1px 2px rgba(255,255,255,.6),
        0 5px 15px rgba(31,38,135,.05);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    transition: .3s ease;
}

.liquid-input-group:focus-within {
    border-color: rgba(13,110,253,.55);
    background: rgba(255,255,255,.65);
    box-shadow:
        0 0 0 4px rgba(13,110,253,.10),
        0 8px 25px rgba(13,110,253,.10);
    transform: translateY(-1px);
}

.liquid-input-icon {
    width: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0d6efd;
    font-size: 17px;
}

.liquid-input {
    width: 100%;
    padding: 13px 15px 13px 0;
    border: 0;
    outline: 0;
    color: #111827;
    font-size: 15px;
    background: transparent;
}

.liquid-input::placeholder {
    color: #9ca3af;
}

.liquid-check {
    border-color: rgba(13,110,253,.35);
    background-color: rgba(255,255,255,.5);
}

.liquid-check:checked {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.liquid-remember {
    color: #6b7280;
    font-size: 14px;
}

.liquid-login-btn {
    position: relative;
    overflow: hidden;
    border: 0;
    border-radius: 15px;
    padding: 14px;
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    background: linear-gradient(135deg,#0d6efd,#6610f2);
    box-shadow:
        0 12px 30px rgba(13,110,253,.30),
        inset 0 1px 1px rgba(255,255,255,.35);
    transition: all .35s ease;
}

.liquid-login-btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 60%;
    height: 100%;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,.35),
        transparent
    );
    transform: skewX(-20deg);
    transition: .6s ease;
}

.liquid-login-btn:hover::before {
    left: 130%;
}

.liquid-login-btn:hover {
    transform: translateY(-3px);
    box-shadow:
        0 18px 35px rgba(13,110,253,.40);
}

.liquid-register-text {
    color: #6b7280;
    font-size: 14px;
}

.liquid-register-link {
    color: #0d6efd;
    font-weight: 700;
    text-decoration: none;
    transition: .2s ease;
}

.liquid-register-link:hover {
    color: #6610f2;
    text-decoration: underline;
}

.liquid-alert {
    border-radius: 14px;
    border: 1px solid rgba(255,255,255,.6);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    font-size: 14px;
}

.liquid-success {
    background: rgba(25,135,84,.12);
    color: #146c43;
}

.liquid-error {
    background: rgba(220,53,69,.12);
    color: #b02a37;
}

@media (max-width:576px) {
    .liquid-card-body {
        padding: 35px 22px;
    }

    .liquid-card {
        border-radius: 25px;
    }

    .liquid-title {
        font-size: 26px;
    }

    .liquid-icon {
        width: 60px;
        height: 60px;
        font-size: 24px;
    }

    .blob-1 {
        width: 180px;
        height: 180px;
    }

    .blob-2 {
        width: 220px;
        height: 220px;
    }
}
</style>

@endsection