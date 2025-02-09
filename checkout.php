<?php
include "db.php";
include "header.php";

// Fetch user details if logged in
$user = null;
if (isset($_SESSION["uid"])) {
    $user = getUserDetails($con, $_SESSION["uid"]);
    if (!$user) {
        header("Location: cart.php");
        exit();
    }
} else {
    header("Location: cart.php");
    exit();
}

// Process cart items
$cartItems = [];
$total = 0;
if (isset($_POST["cmd"])) {
    $cartItems = processCartItems($con, $_POST);
    $total = calculateTotal($cartItems);
}

// Include CSS (move to external file if possible)
include "styles/checkout.css";
?>

<section class="section">
    <div class="container-fluid">
        <div class="row-checkout">
            <!-- Billing and Payment Form -->
            <div class="col-75">
                <div class="container-checkout">
                    <form id="checkout_form" action="checkout_process.php" method="POST" class="was-validated">
                        <div class="row-checkout">
                            <!-- Billing Address -->
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <?php echo renderBillingAddressForm($user); ?>
                            </div>
                            <!-- Payment Details -->
                            <div class="col-50">
                                <h3>Payment</h3>
                                <?php echo renderPaymentForm(); ?>
                            </div>
                        </div>
                        <!-- Hidden Fields for Cart Items -->
                        <?php echo renderHiddenCartFields($cartItems); ?>
                        <input type="submit" id="submit" value="Continue to checkout" class="checkout-btn">
                    </form>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-25">
                <div class="container-checkout">
                    <?php echo renderCartSummary($cartItems, $total); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<div id="newsletter" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>