<?php include "inc/header.php"; ?>

<div class="st-section-title" style="margin-top:0;">
    <h2>Checkout</h2>
    <p>Almost done — confirm your order</p>
</div>

<div class="st-checkout-wrap">
    <div class="st-checkout-grid">
        <!-- Order Summary -->
        <div class="st-checkout-summary">
            <h3>Order Summary</h3>
            <div class="st-cart-wrap">
            <table class="st-table" id="checkout-cart" style="min-width:380px;">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody id="checkout-cart-body"></tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end" style="font-weight:700;">Total</td>
                        <td id="checkout-total" style="font-family:'Syne',sans-serif;font-weight:800;">0 EGP</td>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>

        <!-- Customer Details -->
        <div class="st-checkout-form">
            <h3>Customer Details</h3>
            <form id="checkout-form">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Amr Mustafa" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" placeholder="+20 10 0000 0000" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Delivery Address</label>
                    <textarea class="form-control" id="address" rows="3" placeholder="Street, City, Governorate…" required></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100" style="padding:.8rem;font-size:1rem;">
                    <i class="fa fa-check-circle me-2"></i>Confirm Order
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function renderCheckoutCart(){
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let tbody = document.getElementById('checkout-cart-body');
    let total = 0; tbody.innerHTML = '';
    cart.forEach(item => {
        let subtotal = item.price * item.quantity; total += subtotal;
        tbody.innerHTML += `<tr>
            <td><img src="./images/${item.image}" width="60" height="60" style="border-radius:8px;object-fit:cover;"/></td>
            <td style="text-align:left;font-weight:600;">${item.name}</td>
            <td>${item.price} EGP</td>
            <td>${item.quantity}</td>
            <td style="font-weight:700;">${subtotal} EGP</td>
        </tr>`;
    });
    document.getElementById('checkout-total').innerText = total + ' EGP';
}
renderCheckoutCart();

document.getElementById('checkout-form').addEventListener('submit', function(e){
    e.preventDefault();
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if(cart.length === 0){ alert("Cart empty!"); return; }
    let fd = new FormData();
    fd.append('name', document.getElementById('name').value);
    fd.append('email', document.getElementById('email').value);
    fd.append('phone', document.getElementById('phone').value);
    fd.append('address', document.getElementById('address').value);
    fd.append('cart', JSON.stringify(cart));
    fetch('process_order.php', {method:'POST', body:fd})
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success'){
            alert(data.message);
            localStorage.removeItem('cart');
            document.getElementById('checkout-form').reset();
            renderCheckoutCart();
        } else { alert(data.message); }
    }).catch(err => alert('Error: ' + err));
});
</script>

<?php include "inc/footer.php"; ?>
