 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
.text {
  font-size: clamp(1rem, 9vw, 1.7rem);
  font-weight: 800;
  color: #0d6efd;
  cursor: pointer;
  position: relative;
  letter-spacing: 0.1em;
  margin: 0;
  -webkit-font-smoothing: antialiased;
}
.text span:hover {
  transform: scale(1.18) translateY(-8px);
  color: #e71d1d;
  text-shadow: 0 0 24px rgba(144, 134, 234, 0.55);
}
.text span {
  display: inline-block;
  transition:
    transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
    color 0.35s ease,
    text-shadow 0.35s ease;
}
        .navbar {
            background: #ffffff;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .nav-link {
            font-weight: 500;
            color: #333 !important;
            margin: 0 8px;
            transition: 0.3s;
        }
        .nav-link:hover {
            color: #0d6efd !important;
        }
        .search-box {
            max-width: 420px;
            width: 100%;
        }
        .cart-btn {
            position: relative;
            font-size: 20px;
        }
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -8px;
            font-size: 10px;
        }
        @media (max-width: 991px) {
            .search-box {
                max-width: 100%;
                margin: 15px 0;
            }
            .cart-btn {
                display: inline-block;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg border-bottom shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand text-primary" href="/">
           <h2 class="text me-4">🛍️
          <span>S</span><span>H</span><span>O</span><span>P</span><span>Z</span><span>O</span><span>N</span><span>E</span>
           </h2>
        </a>
        <button  class="navbar-toggler"  type="button"  data-bs-toggle="collapse"  data-bs-target="#mainNavbar" aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/">
                        <i class="bi bi-house-door me-1"></i>
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/myorder') }}">
                        <i class="bi bi-box-seam me-1"></i>
                        Orders
                    </a>
                </li>
            </ul>
<!-- SEARCH -->
            <form action="/search" class="d-flex search-box me-lg-3" role="search">
                <input 
                    class="form-control rounded-start-pill" 
                    type="search"
                    name="query" 
                    placeholder="Search products..."
                    aria-label="Search">
                <button 
                    class="btn btn-primary rounded-end-pill px-4" 
                    type="submit">
                    <i class="bi bi-search"></i>
                    Search
                </button>
            </form>
            <a href="/cartlist" class="btn btn-outline-primary rounded-pill cart-btn px-3 me-2">
                <i class="bi bi-cart3"></i>
                <span class="d-lg-none ms-1">
                    Cart
                </span>
                <span class="badge bg-danger rounded-pill cart-badge">
                    {{ $cartCount ?? 0 }}
                </span>
            </a>
            @if(session()->has('user'))
            <div class="dropdown">
    <button class="btn btn-outline-primary dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown">
        <i class="bi bi-person-circle me-1"></i> {{ Session::get('user')['name'] }}
    </button>
    
    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
        <!-- AGAR LOGGED-IN USER ADMIN HAI TO HI YE LINK DIKHEGA -->
        @if(Session::has('user') && Session::get('user')['is_admin'] == 1)
            <li>
                <a class="dropdown-item fw-bold text-primary" href="{{ url('/admin') }}">
                    <i class="bi bi-speedometer2 me-2"></i> Admin Panel
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
        @endif

        <li>
            <a class="dropdown-item" href="{{ url('/myorder') }}">
                <i class="bi bi-bag me-2"></i> My Orders
            </a>
        </li>
        <li>
            <form action="{{ url('/logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>
            @else
            <a href="/login" class="btn btn-primary rounded-pill px-3">
                <i class="bi bi-box-arrow-in-right me-1"></i>
                Login
            </a>
            @endif
        </div>
    </div>
</nav>
<!-- Navbar End -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body> 
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>  