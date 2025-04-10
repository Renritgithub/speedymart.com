<h3 class="text-center text-success">All orders</h3>
<div class="table-responsive">
    <table id="my-table" class="display table-bordered mt-5">
        <thead class="bg-info text-center">
            <tr>
                <th>SI no</th>
                <th>Due amount</th>
                <th>Invoice number</th>
                <th>Total products</th>
                <th>Order date</th>
                <th>Status</th>
                <th>Delete</th>
                <th>Track</th>
            </tr>
        </thead>
        <tbody class='bg-light text-center'>
        <?php
// Secure query using prepared statements
$get_orders = "SELECT * FROM `user_orders`";
$stmt = mysqli_prepare($con, $get_orders);
mysqli_execute($stmt);
$result = $stmt->get_result();

$num_row = mysqli_num_rows($result);

if ($num_row > 0) {
    $number = 0;
    while ($row_data = mysqli_fetch_assoc($result)) {
        // Escape output to prevent XSS attacks
        $order_id = htmlspecialchars($row_data['order_id'], ENT_QUOTES, 'UTF-8');
        $user_id = htmlspecialchars($row_data['user_id'], ENT_QUOTES, 'UTF-8');
        $amount_due = htmlspecialchars($row_data['amount_due'], ENT_QUOTES, 'UTF-8');
        $invoice_number = htmlspecialchars($row_data['invoice_number'], ENT_QUOTES, 'UTF-8');
        $total_products = htmlspecialchars($row_data['total_products'], ENT_QUOTES, 'UTF-8');
        $order_date = htmlspecialchars($row_data['order_date'], ENT_QUOTES, 'UTF-8');
        $order_status = htmlspecialchars($row_data['order_status'], ENT_QUOTES, 'UTF-8');
        $number++;

        echo "
        <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>
            <td><a href='index.php?product_track=$order_id'><i class='fa-solid fa-truck'></i></a></td>
        </tr>";
    }
} else {
    // If no orders exist, show a message inside the table
    echo "
    <tr>
        <td colspan='8' class='text-danger text-center'>No orders present</td>
    </tr>";
}

// Close the statement
mysqli_stmt_close($stmt);
?>

        </tbody>
    </table>
</div>
