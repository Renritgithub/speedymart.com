<h3 class="text-center text-success">All payment</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php
// Secure query using prepared statements
$get_user = "SELECT * FROM `user_table`";
$stmt = mysqli_prepare($con, $get_user);
mysqli_execute($stmt);
$result = $stmt->get_result();

$num_row = mysqli_num_rows($result);
if ($num_row > 0) {
    echo "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>SI No</th>
                    <th>Username</th>
                    <th>User Email</th>
                    <th>User Mobile</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class='bg-secondary'>";

    $number = 0;
    while ($row_data = mysqli_fetch_assoc($result)) {
        // Secure output using htmlspecialchars
        $user_id = htmlspecialchars($row_data['user_id'], ENT_QUOTES, 'UTF-8');
        $username = htmlspecialchars($row_data['user_name'], ENT_QUOTES, 'UTF-8');
        $user_email = htmlspecialchars($row_data['user_email'], ENT_QUOTES, 'UTF-8');
        $user_mobile = htmlspecialchars($row_data['phone'], ENT_QUOTES, 'UTF-8');
        $number++;

        echo "<tr>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td>$user_mobile</td>
                <td><a href='delete_user.php?user_id=$user_id' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>
              </tr>";
    }

    echo "</tbody></table>";

} else {
    echo "<h2 class='text-danger text-center'>No users found</h2>";
}

// Close statement
mysqli_stmt_close($stmt);
?>

       <!--  <tr>
            <th>SI no</th>
            <th>Due amount</th>
            <th>Invoice number</th>
            <th>Total products</th>
            <th>Order date</th>
            <th>status</th>
            <th>delete</th>
        </tr>
    </thead> -->
    
</table>