<?php include "./inc/header.php"; ?>

<div style="margin-top:1rem;">
    <div class="st-section-title" style="margin-top:0;">
        <h2>Get In Touch</h2>
        <p>We'd love to hear from you — reach out anytime</p>
    </div>

    <div class="st-contact-wrap">
        <div class="st-contact-grid">
            <!-- Form -->
            <div class="st-contact-form">
                <h3 style="font-size:1.3rem;margin-bottom:1.5rem;padding-bottom:.75rem;border-bottom:1px solid var(--border);">Send a Message</h3>
                <form onsubmit="return showAlert()">
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input id="name" type="text" required class="form-control" placeholder="Amr Mustafa">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input id="email" type="email" required class="form-control" placeholder="you@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea id="message" required maxlength="350" class="form-control" rows="5" placeholder="What's on your mind?"></textarea>
                        <small class="text-muted">Max 350 characters</small>
                    </div>
                    <button class="btn btn-primary w-100" style="padding:.75rem;font-size:.95rem;">Send Message <i class="fa fa-paper-plane ms-2"></i></button>
                </form>
            </div>

            <!-- Info -->
            <div class="st-contact-info">
                <h4>Contact Info</h4>
                <p><strong>Email:</strong><br>MoraMustafa@gmail.com</p>
                <p><strong>Phone:</strong><br>+20 11 2322 8587</p>
                <p><strong>Address:</strong><br>Egypt 🇪🇬</p>
                <hr>
                <p>Feel free to reach out anytime. We're always here to help you with anything you need!</p>
                <div class="st-contact-social">
                    <a style="background:#3b5998;" href="https://www.facebook.com/share/1AgnXa3/"><i class="fab fa-facebook-f" style="color:#fff;"></i></a>
                    <a style="background:linear-gradient(135deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);" href="https://www.instagram.com/amr_mostafa__1?igsh=NTRvMnk5cmVmMXBp"><i class="fab fa-instagram" style="color:#fff;"></i></a>
                    <a style="background:#0082ca;" href="https://www.linkedin.com/in/amr-mustafa-a891673b4"><i class="fab fa-linkedin-in" style="color:#fff;"></i></a>
                    <a style="background:#333;" href="https://github.com/AmrMostafa17/E-commerce-Website-/tree/main"><i class="fab fa-github" style="color:#fff;"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showAlert(){
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    if(name && email){
        alert("✅ Feedback has been sent successfully!");
        return false;
    }
}
</script>

<?php include "./inc/footer.php"; ?>
