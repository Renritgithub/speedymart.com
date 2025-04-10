<h3 class="text-center text-success">All categories</h3>
<table class="table table-bordered mt-5">
    <t-head class="bg-info">
        <tr class="text-center">
        <th>SIno</th>
        <th>brands</th>
        <th>Edit</th>
        <th>delete</th>
        </tr>
        
    </t-head>
    <tbody class="bg-secondary text-light">

    <?php

    $select_brand="select * from `brand`";
    $result=mysqli_query($con,$select_brand);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $brand_id=$row['brand_id'];
        $brand_title=$row['brand_title'];
        $number++;
    
    ?>
        <tr class="text-center">
        <td><?php echo $number;?></td>
        <td><?php echo $brand_title;?></td>
        <td><a href="index.php?edit_brand=<?php echo $brand_id;?>" class="text-success"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <td>
    <!-- Trigger the modal -->
    <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" class="btn btn-light text-danger" onclick="setDeleteBrandId(<?php echo $brand_id; ?>)">
        <i class="fa-solid fa-trash"></i>
    </a>
</td>
        </tr>
        <?php
    }?>
    </tbody>
</table>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to delete this brand?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="confirmDelete">Yes</button>
      </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    let brandIdToDelete;

    // Function to set the brand ID when the delete button is clicked
    function setDeleteBrandId(brandId) {
        brandIdToDelete = brandId; // Store the brand ID globally
    }

    // Handle the "Yes" button click to confirm deletion
    $('#confirmDelete').on('click', function() {
        if (brandIdToDelete) {
            $.ajax({
                url: 'delete_brand.php', // PHP script to handle the deletion
                type: 'POST',
                data: { delete_brand: brandIdToDelete },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message); // Show success message
                        $('#exampleModal').modal('hide'); // Close the modal
                        window.location.reload(); // Reload the page or you can remove the row dynamically
                    } else {
                        alert(response.message); // Show error message
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error); // Handle any errors
                }
            });
        }
    });
</script>
