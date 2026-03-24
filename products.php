<?php
include "./inc/headerProducts.php";

$search   = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';

$sql    = "SELECT * FROM products WHERE 1";
$params = [];

if ($search != '') {
    $sql .= " AND (name LIKE ? OR description LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

if ($category != '') {
    $sql .= " AND category_id = ?";
    $params[] = $category;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();
?>

<div class="st-products-header">
    <h1>All Products</h1>
    <span class="st-products-count"><?= count($products) ?> item<?= count($products)!=1?'s':'' ?> found</span>
</div>

<div class="st-grid-3">
<?php foreach ($products as $product): ?>
<div class="st-card">
    <div class="st-card-img-wrap">
        <img src="./images/<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
    </div>
    <div class="st-card-body">
        <h5><?= $product['name'] ?></h5>
        <div class="st-card-price"><?= $product['price'] ?> <span>EGP</span></div>
        <div class="mt-auto">
            <a href="productDetails.php?id=<?= $product['id'] ?>" class="btn-st-dark">View Details</a>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>

<?php include "./inc/footer.php"; ?>
