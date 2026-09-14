<?php

// ==========================================
// PRODUCT DATA
// ==========================================

$products = [
    [
        "name" => "Laptop",
        "price" => 75000,
        "quantity" => 1
    ],
    [
        "name" => "Keyboard",
        "price" => 2500,
        "quantity" => 2
    ],
    [
        "name" => "Mouse",
        "price" => 1200,
        "quantity" => 3
    ],
    [
        "name" => "Headphones",
        "price" => 3500,
        "quantity" => 1
    ]
];


// ==========================================
// TAX RATE
// ==========================================

const TAX_RATE = 0.05; // 5% tax


// ==========================================
// FUNCTION: CALCULATE LINE TOTAL
// ==========================================

function calculateLineTotal($price, $quantity)
{
    return $price * $quantity;
}


// ==========================================
// FUNCTION: CALCULATE SUBTOTAL
// ==========================================

function calculateSubtotal($products)
{
    $subtotal = 0;

    foreach ($products as $product) {
        $subtotal += calculateLineTotal(
            $product["price"],
            $product["quantity"]
        );
    }

    return $subtotal;
}


// ==========================================
// FUNCTION: CALCULATE DISCOUNT
// ==========================================

function calculateDiscount($subtotal)
{
    // If subtotal is 100,000 or more,
    // customer receives 10% discount.

    if ($subtotal >= 100000) {
        return $subtotal * 0.10;
    }

    // If subtotal is 50,000 or more,
    // customer receives 5% discount.

    elseif ($subtotal >= 50000) {
        return $subtotal * 0.05;
    }

    // No discount
    else {
        return 0;
    }
}


// ==========================================
// FUNCTION: CALCULATE TAX
// ==========================================

function calculateTax($amount)
{
    return $amount * TAX_RATE;
}


// ==========================================
// FUNCTION: CALCULATE FINAL PAYABLE AMOUNT
// ==========================================

function calculateFinalTotal($subtotal, $discount, $tax)
{
    return ($subtotal - $discount) + $tax;
}


// ==========================================
// CALCULATIONS
// ==========================================

$subtotal = calculateSubtotal($products);

$discount = calculateDiscount($subtotal);

// Tax is calculated after discount
$taxableAmount = $subtotal - $discount;

$tax = calculateTax($taxableAmount);

$finalTotal = calculateFinalTotal(
    $subtotal,
    $discount,
    $tax
);


// ==========================================
// DISCOUNT MESSAGE
// ==========================================

if ($discount > 0) {
    $discountMessage = "Discount has been applied to your invoice.";
} else {
    $discountMessage = "No discount available for this purchase.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Invoice Generator</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="invoice-container">

        <!-- ==========================================
             INVOICE HEADER
        =========================================== -->

        <div class="invoice-header">

            <div>
                <h1>Product Invoice</h1>
                <p>Mini Project - PHP</p>
            </div>

            <div class="invoice-info">
                <p><strong>Invoice #:</strong> INV-001</p>
                <p><strong>Date:</strong> <?php echo date("Y-m-d"); ?></p>
            </div>

        </div>


        <!-- ==========================================
             PRODUCT TABLE
        =========================================== -->

        <table>

            <thead>

                <tr>

                    <th>#</th>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Line Total</th>

                </tr>

            </thead>

            <tbody>

                <?php

                $counter = 1;

                foreach ($products as $product):

                    $lineTotal = calculateLineTotal(
                        $product["price"],
                        $product["quantity"]
                    );

                ?>

                    <tr>

                        <td>
                            <?php echo $counter; ?>
                        </td>

                        <td>
                            <?php echo $product["name"]; ?>
                        </td>

                        <td>
                            AFN <?php echo number_format($product["price"], 2); ?>
                        </td>

                        <td>
                            <?php echo $product["quantity"]; ?>
                        </td>

                        <td>
                            AFN <?php echo number_format($lineTotal, 2); ?>
                        </td>

                    </tr>

                <?php

                    $counter++;

                endforeach;

                ?>

            </tbody>

        </table>


        <!-- ==========================================
             DISCOUNT MESSAGE
        =========================================== -->

        <div class="discount-message">

            <?php echo $discountMessage; ?>

        </div>


        <!-- ==========================================
             INVOICE SUMMARY
        =========================================== -->

        <div class="summary">

            <div class="summary-row">

                <span>Subtotal:</span>

                <strong>
                    AFN <?php echo number_format($subtotal, 2); ?>
                </strong>

            </div>


            <div class="summary-row discount">

                <span>Discount:</span>

                <strong>
                    - AFN <?php echo number_format($discount, 2); ?>
                </strong>

            </div>


            <div class="summary-row">

                <span>Tax (<?php echo TAX_RATE * 100; ?>%):</span>

                <strong>
                    AFN <?php echo number_format($tax, 2); ?>
                </strong>

            </div>


            <div class="summary-row final-total">

                <span>Final Payable Amount:</span>

                <strong>
                    AFN <?php echo number_format($finalTotal, 2); ?>
                </strong>

            </div>

        </div>


        <!-- ==========================================
             FOOTER
        =========================================== -->

        <div class="invoice-footer">

            <p>Thank you for your purchase!</p>

        </div>

    </div>

</body>

</html>