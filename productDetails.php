<?php
include "./inc/header.php";

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM products WHERE id=?');
$stmt->execute([$id]);
$product = $stmt->fetch();

$search = $_GET['search'] ?? '';
$name = $product['name'];
$description = $product['description'];
if ($search != '') {
    $name = str_ireplace($search, "<mark>$search</mark>", $name);
    $description = str_ireplace($search, "<mark>$search</mark>", $description);
}
?>

<h1>Product Details</h1>
<div class="st-details-wrap">
    <div class="st-details-grid">
        <img src="./images/<?= $product['image'] ?>" class="st-details-img" alt="<?= htmlspecialchars($product['name']) ?>">
        <div class="st-details-content">
            <h2><?= $name ?></h2>
            <div class="st-price"><?= $product['price'] ?> <span>EGP</span></div>
            <p><?= $description ?></p>
            <div class="st-details-actions">
                <a href="products.php<?= $search ? '?search='.$search : '' ?>" class="btn btn-outline-secondary">
                    ← Back
                </a>
                <button onclick='addToCart(<?= json_encode($product) ?>)' class="btn btn-st-gold px-4">
                    <i class="fa fa-bag-shopping me-2"></i>Add To Cart
                </button>
            </div>
        </div>
    </div>
</div>

<div class="st-toast" id="cart-toast"></div>

<script>
function addToCart(product) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let existing = cart.find(item => item.id == product.id);
    if (existing) {
        existing.quantity++;
    } else {
        product.quantity = 1;
        cart.push(product);
    }
    localStorage.setItem('cart', JSON.stringify(cart));

    let toast = document.getElementById('cart-toast');
    toast.innerHTML = '<i class="fa fa-check-circle me-2" style="color:var(--green);"></i>' + product.name + ' added to cart!';
    toast.style.display = 'block';
    setTimeout(() => { toast.style.display = 'none'; }, 2500);
}
</script>

<?php include "./inc/footer.php"; ?>
