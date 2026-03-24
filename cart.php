<?php include "./inc/header.php"; ?>

<div class="st-section-title" style="margin-top:0;">
    <h2>Your Cart</h2>
    <p>Review your items before checkout</p>
</div>

<div class="st-cart-wrap" style="margin-bottom:1.5rem;">
    <table class="st-table" id="cart-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="cart-body"></tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-end" style="font-weight:700;font-size:.95rem;">Total</td>
                <td id="cart-total" style="font-family:'Syne',sans-serif;font-weight:800;font-size:1.1rem;color:var(--ink);">0 EGP</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>

<div style="display:flex;justify-content:flex-end;gap:.75rem;">
    <a href="products.php" class="btn btn-outline-secondary">← Continue Shopping</a>
    <a href="checkout.php" class="btn btn-success px-4">Proceed to Checkout →</a>
</div>

<script>
    function renderCart() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let tbody = document.getElementById('cart-body');
        let total = 0;
        tbody.innerHTML = '';

        if(cart.length === 0){
            tbody.innerHTML = '<tr><td colspan="6" style="padding:3rem;color:var(--ink-muted);font-size:.95rem;">Your cart is empty. <a href="products.php" style="color:var(--gold);">Shop now</a></td></tr>';
            document.getElementById('cart-total').innerText = '0 EGP';
            return;
        }

        cart.forEach((item, index) => {
            let subtotal = item.price * item.quantity;
            total += subtotal;
            tbody.innerHTML += `
            <tr>
                <td><img src="./images/${item.image}" width="70" height="70" style="border-radius:10px;object-fit:cover;"/></td>
                <td style="font-weight:600;text-align:left;">${item.name}</td>
                <td>${item.price} EGP</td>
                <td>
                    <div style="display:inline-flex;align-items:center;gap:.5rem;">
                        <button class="st-qty-btn" onclick="updateQuantity(${index}, -1)">−</button>
                        <span style="font-weight:700;min-width:20px;">${item.quantity}</span>
                        <button class="st-qty-btn" onclick="updateQuantity(${index}, 1)">+</button>
                    </div>
                </td>
                <td style="font-weight:700;">${subtotal} EGP</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="if(confirm('Remove this item?')) removeItem(${index})">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>`;
        });

        document.getElementById('cart-total').innerText = total + ' EGP';
    }

    function updateQuantity(index, change) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart[index].quantity += change;
        if (cart[index].quantity < 1) cart[index].quantity = 1;
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    }

    function removeItem(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    }

    renderCart();
</script>

<?php include "./inc/footer.php"; ?>
