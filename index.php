<?php include "./inc/header.php"; ?>

<!-- HERO -->
<section class="st-hero">
    <div class="st-badge">✦ New Arrivals Every Week</div>
    <h1>Shop the <span>Best</span><br>Deals Online</h1>
    <p>Discover amazing products at unbeatable prices — fast delivery, easy returns.</p>
    <a href="products.php" class="btn-hero">Shop Now →</a>
</section>

<!-- LATEST PRODUCTS -->
<div class="st-section-title">
    <h2>🔥 Latest Products</h2>
    <p>Handpicked just for you</p>
</div>

<div class="st-grid-4">
<?php
$FeatureProducts = $pdo->query('SELECT * FROM `products` ORDER BY id DESC LIMIT 4');
foreach ($FeatureProducts as $FeatureProduct):
?>
<div class="st-card">
    <div class="st-card-img-wrap">
        <img src="./images/<?= $FeatureProduct['image'] ?>" alt="<?= htmlspecialchars($FeatureProduct['name']) ?>">
    </div>
    <div class="st-card-body">
        <h5><?= $FeatureProduct['name'] ?></h5>
        <div class="st-card-price"><?= $FeatureProduct['price'] ?> <span>EGP</span></div>
        <div class="mt-auto">
            <a href="productDetails.php?id=<?= $FeatureProduct['id'] ?>" class="btn-st-dark">View Details</a>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>

<?php include "./inc/footer.php"; ?>
