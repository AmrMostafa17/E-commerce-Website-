<?php include "inc/config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products — Carty Store</title>
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
            <ul class="navbar-nav me-auto mt-2 mt-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <!-- Categories Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle cat-dropdown-btn" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-grid-2 me-1"></i> Categories
                    </a>
                    <ul class="dropdown-menu cat-dropdown-menu">
                        <?php
                        $categories = $pdo->query('SELECT * FROM categories');
                        foreach ($categories as $category):
                        $isActive = ($_GET['category'] ?? '') == $category['id'];
                        ?>
                        <li>
                            <a class="dropdown-item cat-dropdown-item <?= $isActive ? 'active' : '' ?>"
                               href="products.php?category=<?= $category['id'] ?>">
                               <?= htmlspecialchars($category['name']) ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link cart-link" href="cart.php">
                        <i class="fa fa-bag-shopping me-1"></i> Cart
                    </a>
                </li>
            </ul>

            <!-- Search -->
            <form method="GET" action="products.php">
                <div style="display:flex;align-items:center;background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.14);border-radius:50px;overflow:hidden;">
                    <input type="text" name="search"
                        placeholder="Search products..."
                        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                        style="all:unset;color:#fff;font-size:.83rem;padding:.45rem 0 .45rem 1.1rem;width:180px;">
                    <button type="submit"
                        style="all:unset;background:#D4A843;color:#0f172a;font-size:.82rem;font-weight:800;padding:.45rem 1.2rem;cursor:pointer;white-space:nowrap;border-radius:0 50px 50px 0;">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav>

    <div class="container hero bg-light">