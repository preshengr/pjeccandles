<?php
// Fetch user details from the database
function getUserDetails($con, $userId) {
    $sql = "SELECT * FROM user_info WHERE user_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Process cart items from POST data
function processCartItems($con, $postData) {
    $cartItems = [];
    $totalCount = $postData['total_count'];
    for ($i = 1; $i <= $totalCount; $i++) {
        $itemName = $postData['item_name_' . $i];
        $amount = $postData['amount_' . $i];
        $quantity = $postData['quantity_' . $i];
        $productId = getProductId($con, $itemName);
        $cartItems[] = [
            'product_id' => $productId,
            'item_name' => $itemName,
            'amount' => $amount,
            'quantity' => $quantity
        ];
    }
    return $cartItems;
}

// Get product ID by name
function getProductId($con, $productName) {
    $sql = "SELECT product_id FROM products WHERE product_title = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['product_id'];
}

// Calculate total price of cart items
function calculateTotal($cartItems) {
    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item['amount'];
    }
    return $total;
}

// Render billing address form
function renderBillingAddressForm($user) {
    return '
        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
        <input type="text" id="fname" class="form-control" name="firstname" pattern="^[a-zA-Z ]+$" value="' . $user["first_name"] . ' ' . $user["last_name"] . '" required>
        <label for="email"><i class="fa fa-envelope"></i> Email</label>
        <input type="text" id="email" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" value="' . $user["email"] . '" required>
        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
        <input type="text" id="adr" name="address" class="form-control" value="' . $user["address1"] . '" required>
        <label for="city"><i class="fa fa-institution"></i> City</label>
        <input type="text" id="city" name="city" class="form-control" value="' . $user["address2"] . '" pattern="^[a-zA-Z ]+$" required>
        <div class="row">
            <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" class="form-control" pattern="^[a-zA-Z ]+$" required>
            </div>
            <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" class="form-control" pattern="^[0-9]{6}(?:-[0-9]{4})?$" required>
            </div>
        </div>
    ';
}

// Render payment form
function renderPaymentForm() {
    return '
        <label for="fname">Accepted Cards</label>
        <div class="icon-container">
            <i class="fa fa-cc-visa" style="color:navy;"></i>
            <i class="fa fa-cc-amex" style="color:blue;"></i>
            <i class="fa fa-cc-mastercard" style="color:red;"></i>
            <i class="fa fa-cc-discover" style="color:orange;"></i>
        </div>
        <label for="cname">Name on Card</label>
        <input type="text" id="cname" name="cardname" class="form-control" pattern="^[a-zA-Z ]+$" required>
        <div class="form-group" id="card-number-field">
            <label for="cardNumber">Card Number</label>
            <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
        </div>
        <label for="expdate">Exp Date</label>
        <input type="text" id="expdate" name="expdate" class="form-control" pattern="^((0[1-9])|(1[0-2]))\/(\d{2})$" placeholder="12/22" required>
        <div class="row">
            <div class="col-50">
                <div class="form-group CVV">
                    <label for="cvv">CVV</label>
                    <input type="text" class="form-control" name="cvv" id="cvv" required>
                </div>
            </div>
        </div>
    ';
}

// Render hidden fields for cart items
function renderHiddenCartFields($cartItems) {
    $html = '';
    foreach ($cartItems as $index => $item) {
        $i = $index + 1;
        $html .= '
            <input type="hidden" name="prod_id_' . $i . '" value="' . $item['product_id'] . '">
            <input type="hidden" name="prod_price_' . $i . '" value="' . $item['amount'] . '">
            <input type="hidden" name="prod_qty_' . $i . '" value="' . $item['quantity'] . '">
        ';
    }
    $html .= '<input type="hidden" name="total_count" value="' . count($cartItems) . '">';
    $html .= '<input type="hidden" name="total_price" value="' . calculateTotal($cartItems) . '">';
    return $html;
}

// Render cart summary
function renderCartSummary($cartItems, $total) {
    if (empty($cartItems)) {
        return '<h4>Cart is empty</h4>';
    }
    $html = '
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>' . count($cartItems) . '</b></span></h4>
        <table class="table table-condensed">
            <thead><tr>
                <th>No</th>
                <th>Product Title</th>
                <th>Qty</th>
                <th>Amount</th>
            </tr></thead>
            <tbody>
    ';
    foreach ($cartItems as $index => $item) {
        $html .= '
            <tr>
                <td><p>' . ($index + 1) . '</p></td>
                <td><p>' . $item['item_name'] . '</p></td>
                <td><p>' . $item['quantity'] . '</p></td>
                <td><p>' . $item['amount'] . '</p></td>
            </tr>
        ';
    }
    $html .= '
            </tbody>
        </table>
        <hr>
        <h3>Total <span class="price" style="color:black"><b>$' . $total . '</b></span></h3>
    ';
    return $html;
}
?>