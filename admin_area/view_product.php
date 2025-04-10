

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <style>
    
    .product_img {
        width: 100px; /* Set a fixed width for images */
        height: auto;
    }

     /* Ensure the table takes the full width of the container */
    
    .fa-pen-to-square, .fa-trash{
        margin: 0 5px;
    }

    
</style>
  
</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.x.x/js/all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <h3 class="text-center text-success">All products</h3>
    <div class=" m-auto d-flex align-item-center justify-content-center my-5">
    
<div class="table-responsive">
<table id="myTable" class="display">
    <thead class="bg-info">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Old Price</th>
            <th>New Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>add attributes</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_products = "select * from `products`";
        $result = mysqli_query($con, $get_products);
        $number = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $old_price = $row['old_price'];
            $new_price = $row['new_price'];
            $status = $row['status'];
            $number++;
        ?>
        <tr>
            <td><?php echo $product_id; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src='product_images/<?php echo $product_image1; ?>' class='product_img'></td>
            <td><?php echo $old_price; ?></td>
            <td><?php echo $new_price; ?></td>
            <td style="padding-right:10px">
                <?php
                $get_count = "select * from `orders_pending` where product_id=$product_id";
                $result_count = mysqli_query($con, $get_count);
                $rows_count = mysqli_num_rows($result_count);
                echo $rows_count;
                ?>
            </td>
            <td><?php echo $status; ?></td>
            <td><a href="index.php?product_attribute=<?php echo $product_id;?>" class="text-success"><i class="fa-solid fa-folder-plus"></i></i></a></td>
            <td><a href="index.php?edit_product=<?php echo $product_id;?>" class="text-success"><i class="fa-solid fa-pen-to-square"></i></a></td>
            
            <td><a href="javascript:void(0);" onclick="deleteproduct(<?php echo $product_id; ?>)" class="text-danger">
        <i class="fa-solid fa-trash"></i>
    </a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>


    </div>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Function to handle the deletion of a product
    function deleteproduct(productId) {
        if (confirm('Are you sure you want to delete this category?')) {
            $.ajax({
                url: 'delete_category.php', // Update with the path to your delete PHP file
                type: 'POST',
                data: { delete_product: productId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message); // Show success message
                        // Optionally remove the deleted product row from the DOM
                        $('a[onclick="deleteproduct(' + productId + ')"]').closest('tr').remove();
                    } else {
                        alert(response.message); // Show error message
                    }
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    alert('An error occurred: ' + error);
                }
            });
        }
    }
</script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

   
</body>
</html>