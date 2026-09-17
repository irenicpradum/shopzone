<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 🛍️ ShopZone-E-commerce</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- PRELOADER CSS -->
   <style>
    /* ================= PROFESSIONAL PRELOADER ================= */
    #preloader {
        position: fixed;
        inset: 0;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99999;
        opacity: 1;
        visibility: visible;
        transition: opacity 0.7s ease, visibility 0.7s ease;
    }
    #preloader.hide {
        opacity: 0;
        visibility: hidden;
    }
    .preloader-wrapper {
        width: 300px;
        text-align: center;
    }
    /* Logo */
    .preloader-logo {
        font-size: 36px;
        font-weight: 800;
        letter-spacing: -1px;
        color: #212529;
        margin-bottom: 8px;
    }
    .preloader-logo span {
        color: #0d6efd;
    }
    /* Tagline */
    .preloader-tagline {
        font-size: 13px;
        color: #6c757d;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 30px;
    }
    /* Loading Bar */
    .loading-bar {
        width: 100%;
        height: 4px;
        background: #e9ecef;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
    }
    .loading-progress {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 40%;
        background: #0d6efd;
        border-radius: 20px;
        animation: loading 1.5s ease-in-out infinite;
    }
    @keyframes loading {
        0% {
            left: -40%;
        }
        100% {
            left: 100%;
        }
    }
    /* Loading Text */
    .preloader-status {
        margin-top: 14px;
        font-size: 12px;
        color: #868e96;
        letter-spacing: 1px;
    }
    /* Three Dots */
    .dots span {
        display: inline-block;
        width: 4px;
        height: 4px;
        background: #0d6efd;
        border-radius: 50%;
        margin-left: 3px;
        animation: dots 4s infinite;
    }
    .dots span:nth-child(2) {
        animation-delay: 0.2s;
    }
    .dots span:nth-child(3) {
        animation-delay: 0.4s;
    }
    @keyframes dots {
        0%, 60%, 100% {
            opacity: 0.3;
            transform: translateY(0);
        }
        30% {
            opacity: 1;
            transform: translateY(-3px);
        }
    }
</style>
</head>
<body>
<!-- ================= PROFESSIONAL PRELOADER ================= -->
<div id="preloader">
    <div class="preloader-wrapper">
        <div class="preloader-logo">
            Shop<span>Zone</span>
        </div>
        <div class="preloader-tagline">
            Your Shopping Destination
        </div>
        <div class="loading-bar">
            <div class="loading-progress"></div>
        </div>
        <div class="preloader-status">
            Loading
            <span class="dots">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
    </div>
</div>
<!-- ================= HEADER ================= -->
{{View::make('header')}}
<!-- ================= WEBSITE CONTENT ================= -->
@yield('content')
<!-- ================= FOOTER ================= -->
{{View::make('footer')}}
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<!-- ================= PRELOADER JS ================= -->
<script>
    window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");
        setTimeout(function () {
            preloader.classList.add("hide");
        }, 500);
    });
</script>
</body>
</html>