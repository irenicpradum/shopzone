<!-- Footer Start -->
<footer class="liquid-footer text-white pt-5 pb-3 mt-5">
    <div class="liquid-footer-orb footer-orb-1"></div>
    <div class="liquid-footer-orb footer-orb-2"></div>

    <div class="container position-relative">
        <div class="row g-4">

            <!-- About -->
            <div class="col-lg-4 col-md-6">
                <h4 class="fw-bold mb-3">
                    <a href="{{ url('/') }}" class="liquid-brand text-decoration-none">
                        🛍️ ShopZone
                    </a>
                </h4>
                <p class="liquid-footer-text">
                    ShopZone is your one-stop online shopping destination.
                    Discover quality products, great deals and a seamless
                    shopping experience at affordable prices.
                </p>
                <!-- Social Icons -->
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="liquid-social">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="liquid-social">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="liquid-social">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="#" class="liquid-social">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h5 class="liquid-footer-heading fw-bold mb-3">
                    Quick Links
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ url('/') }}" class="liquid-footer-link">
                            Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/') }}" class="liquid-footer-link">
                            Products
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/myorder') }}" class="liquid-footer-link">
                            Orders
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="liquid-footer-link">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#" class="liquid-footer-link">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Customer Support -->
            <div class="col-lg-3 col-md-6">
                <h5 class="liquid-footer-heading fw-bold mb-3">
                    Customer Support
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#" class="liquid-footer-link">
                            Help Center
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="liquid-footer-link">
                            Shipping & Delivery
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="liquid-footer-link">
                            Return & Refund
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="liquid-footer-link">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="#" class="liquid-footer-link">
                            Terms & Conditions
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Contact -->
            <div class="col-lg-3 col-md-6">
                <h5 class="liquid-footer-heading fw-bold mb-3">
                    Contact Us
                </h5>
                <p class="liquid-footer-text mb-2">
                    <i class="bi bi-geo-alt-fill liquid-icon me-2"></i>
                    New Delhi, India
                </p>
                <p class="liquid-footer-text mb-2">
                    <i class="bi bi-telephone-fill liquid-icon me-2"></i>
                    <a href="tel:+918576930823" class="liquid-footer-link">
                        +91 8576930823
                    </a>
                </p>
                <p class="liquid-footer-text mb-3">
                    <i class="bi bi-envelope-fill liquid-icon me-2"></i>
                    <a href="mailto:support@shopzone.com" class="liquid-footer-link">
                        support@shopzone.com
                    </a>
                </p>
                <!-- Newsletter -->
                <div class="liquid-newsletter">
                    <input
                        type="email"
                        class="liquid-newsletter-input"
                        placeholder="Your email">
                    <button class="liquid-subscribe">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
        <!-- Divider -->
        <div class="liquid-divider my-4"></div>
        <!-- Bottom Footer -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="liquid-footer-text mb-0">
                    © 2026 ShopZone. All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                <span class="liquid-footer-text">
                    Made with
                    <i class="bi bi-heart-fill text-danger"></i>
                    for our customers
                </span>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->
<!-- ================= LIQUID GLASS FOOTER CSS ================= -->
<style>
.liquid-footer {
    position: relative;
    overflow: hidden;
    background:
        radial-gradient(circle at 10% 20%,rgba(13,110,253,.22),transparent 30%),
        radial-gradient(circle at 90% 80%,rgba(111,66,193,.22),transparent 30%),
        linear-gradient(135deg,#07111f,#0b1324,#101827);
    border-top: 1px solid rgba(255,255,255,.12);
    box-shadow: 0 -20px 60px rgba(0,0,0,.15);
}
.liquid-footer-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(70px);
    opacity: .35;
    pointer-events: none;
}
.footer-orb-1 {
    width: 280px;
    height: 280px;
    background: #0d6efd;
    top: -140px;
    left: 5%;
}
.footer-orb-2 {
    width: 300px;
    height: 300px;
    background: #6610f2;
    right: 5%;
    bottom: -180px;
}
.liquid-brand {
    display: inline-block;
    color: #fff;
    font-size: 25px;
    transition: .3s ease;
    text-shadow: 0 0 20px rgba(13,110,253,.4);
}
.liquid-brand:hover {
    color: #63a4ff;
    transform: translateY(-2px);
}
.liquid-footer-heading {
    color: #fff;
    font-size: 17px;
}
.liquid-footer-text {
    color: rgba(255,255,255,.58);
    line-height: 1.7;
    font-size: 14px;
}
.liquid-footer-link {
    color: rgba(255,255,255,.58);
    text-decoration: none;
    transition: .25s ease;
}
.liquid-footer-link:hover {
    color: #63a4ff;
    padding-left: 4px;
}
.liquid-icon {
    color: #63a4ff;
}
.liquid-social {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: rgba(255,255,255,.75);
    text-decoration: none;
    background: rgba(255,255,255,.07);
    border: 1px solid rgba(255,255,255,.15);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.12),
        0 8px 25px rgba(0,0,0,.15);
    transition: all .3s ease;
}
.liquid-social:hover {
    color: #fff;
    background: rgba(13,110,253,.65);
    border-color: rgba(255,255,255,.3);
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(13,110,253,.25);
}
.liquid-newsletter {
    display: flex;
    overflow: hidden;
    padding: 4px;
    border-radius: 14px;
    background: rgba(255,255,255,.07);
    border: 1px solid rgba(255,255,255,.15);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.1),
        0 8px 25px rgba(0,0,0,.15);
}
.liquid-newsletter-input {
    width: 100%;
    min-width: 0;
    padding: 10px 12px;
    border: 0;
    outline: 0;
    color: #fff;
    background: transparent;
    font-size: 14px;
}
.liquid-newsletter-input::placeholder {
    color: rgba(255,255,255,.45);
}
.liquid-subscribe {
    border: 0;
    border-radius: 11px;
    padding: 10px 15px;
    color: #fff;
    background: linear-gradient(135deg,#0d6efd,#6610f2);
    font-size: 13px;
    font-weight: 600;
    white-space: nowrap;
    box-shadow: 0 5px 15px rgba(13,110,253,.25);
    transition: .3s ease;
}
.liquid-subscribe:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(13,110,253,.4);
}
.liquid-divider {
    height: 1px;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,.18),
        transparent
    );
}
@media (max-width:576px) {
    .liquid-footer {
        text-align: center;
    }
    .liquid-social {
        margin: 0 auto;
    }
    .liquid-newsletter {
        margin-top: 10px;
    }
    .liquid-brand {
        font-size: 23px;
    }
}
</style>