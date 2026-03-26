<?php include "inc/config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carty Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Carty Store</a>
            <button class="navbar-toggler d-lg-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fa fa-bag-shopping me-1"></i>Cart</a></li>
                </ul>
                <form method="GET" action="products.php">
                    <div style="display:flex;align-items:center;background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.14);border-radius:50px;overflow:hidden;gap:0;">
                        <input
                            type="text"
                            name="search"
                            placeholder="Search products..."
                            value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                            style="all:unset;color:#fff;font-size:.83rem;padding:.45rem 0 .45rem 1.1rem;width:180px;background:transparent;">
                        <button
                            type="submit"
                            style="all:unset;background:#D4A843;color:#0f172a;font-size:.82rem;font-weight:800;padding:.45rem 1.2rem;cursor:pointer;white-space:nowrap;border-radius:0 50px 50px 0;">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <div class="container hero bg-light">