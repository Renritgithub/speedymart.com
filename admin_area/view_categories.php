<h3 class="text-center text-success">All categories</h3>
<table class="table table-bordered mt-5">
    <t-head class="bg-info">
        <tr class="text-center">
        <th>SIno</th>
        <th>Categories</th>
        <th>Edit</th>
        <th>delete</th>
        </tr>
        
    </t-head>
    <tbody class="bg-secondary text-light">

    <?php

    $select_cat="select * from `categories`";
    $result=mysqli_query($con,$select_cat);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $category_id=$row['category_id'];
        $category_title=htmlspecialchars($row['category_title']);
        $number++;
    
    ?>
        <tr class="text-center">
        <td><?php echo $number;?></td>
        <td><?php echo $category_title;?></td>
        <td><a href="index.php?edit_category=<?php echo $category_id;?>" class="text-success"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <td>
    <a href="javascript:void(0);" onclick="deleteCategory(<?php echo $category_id; ?>)" class="text-danger">
        <i class="fa-solid fa-trash"></i>
    </a>
</td>

        </tr>
        <?php
    }?>
    </tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Function to handle the deletion of a category
    function deleteCategory(categoryId) {
        if (confirm('Are you sure you want to delete this category?')) {
            $.ajax({
                url: 'delete_category.php', // Update with the path to your delete PHP file
                type: 'POST',
                data: { delete_category: categoryId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message); // Show success message
                        // Optionally remove the deleted category row from the DOM
                        $('a[onclick="deleteCategory(' + categoryId + ')"]').closest('tr').remove();
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
    // Function to handle the deletion of a category
    function editCategory(categoryId) {
        if (confirm('Are you sure you want to delete this category?')) {
            $.ajax({
                url: 'delete_category.php', // Update with the path to your delete PHP file
                type: 'POST',
                data: { delete_category: categoryId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message); // Show success message
                        // Optionally remove the deleted category row from the DOM
                        $('a[onclick="deleteCategory(' + categoryId + ')"]').closest('tr').remove();
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
