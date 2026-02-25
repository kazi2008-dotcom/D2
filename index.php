<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DesiDelight | Authentic Homemade Goodness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .brand-font { font-family: 'Playfair Display', serif; }

        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('https://images.unsplash.com/photo-1596797038558-b1291873634c?q=80&w=1920');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
        }

        .trust-badge {
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .trust-badge:hover {
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border-color: #198754;
        }

        /* Improved Footer */
        footer {
            background-color: #111;
        }

        .footer-text {
            color: #f8f9fa;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .footer-links a {
            color: #f8f9fa;
            transition: 0.3s;
        }

        .footer-links a:hover {
            color: #198754;
        }

        .heart {
            color: red;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand brand-font fs-3 text-success" href="index.php">DesiDelight</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php">All Products</a></li>
                <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

                <!-- Cart -->
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-success position-relative" href="cart.php">
                        🛒
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                        </span>
                    </a>
                </li>

                <!-- Login/User -->
                <li class="nav-item ms-2">
                    <?php if(isset($_SESSION['user_name'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown">
                                👋 <?php echo $_SESSION['user_name']; ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="orders.php">My Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a class="btn btn-outline-success" href="login.php">Login</a>
                    <?php endif; ?>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<header class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 brand-font mb-4">Taste the Tradition</h1>
        <p class="lead mb-5">100% Homemade, Preservative-Free Snacks & Sweets delivered to your doorstep.</p>
        <a href="products.php" class="btn btn-success btn-lg px-5">Shop Now</a>
    </div>
</header>

<!-- TRUST SECTION -->
<section class="container my-5 py-5 text-center">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="trust-badge">
                <h3 class="fs-1">🏠</h3>
                <h5 class="fw-bold">Truly Homemade</h5>
                <p class="text-muted">Prepared in small batches by local home-chefs.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="trust-badge">
                <h3 class="fs-1">🧼</h3>
                <h5 class="fw-bold">Hygiene First</h5>
                <p class="text-muted">FSSAI compliant kitchen and safety standards.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="trust-badge">
                <h3 class="fs-1">📦</h3>
                <h5 class="fw-bold">Freshly Packed</h5>
                <p class="text-muted">We pack only after you place your order.</p>
            </div>
        </div>
    </div>
</section>

<!-- IMPROVED FOOTER -->
<footer class="py-5 text-center">
    <div class="container">
        <h2 class="brand-font mb-4 text-white">DesiDelight</h2>

        <ul class="list-inline mb-4 footer-links">
            <li class="list-inline-item mx-3">
                <a href="#" class="text-decoration-none">Privacy Policy</a>
            </li>
            <li class="list-inline-item mx-3">
                <a href="#" class="text-decoration-none">Terms of Service</a>
            </li>
            <li class="list-inline-item mx-3">
                <a href="#" class="text-decoration-none">Shipping Info</a>
            </li>
        </ul>

        <p class="footer-text">
            © 2026 DesiDelight Homemade Food Products. 
            Made with <span class="heart">❤</span> in India.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>