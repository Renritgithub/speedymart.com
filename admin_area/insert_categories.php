

<h3 class="text-center">Insert categories</h3>
<form id="categoryForm" class="mb-2">
    <div class="input-group w-90 mb-3 my-3">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="cat_title" id="cat_title" placeholder="Insert categories" aria-label="Category" aria-describedby="basic-addon1" required>
    </div>
    <div class="input-group w-90 mb-3 bg-info">
        <input type="submit" name="insert_cat" value="Insert categories" class="bg-info border-0 p-2 my-3 w-40 button">
    </div>
</form>

<div id="responseMessage"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#categoryForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting the usual way

            var categoryTitle = $('#cat_title').val();

            $.ajax({
                url: 'insert_category.php', // Update this with the correct PHP file path
                type: 'POST',
                data: { cat_title: categoryTitle },
                dataType: 'json',
                success: function(response) {
                    // Clear the response message
                    $('#responseMessage').empty();

                    if (response.status == 'success') {
                        // Show success message
                        $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                    } else {
                        // Show error message
                        $('#responseMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }

                    // Clear the input field
                    $('#cat_title').val('');
                },
                error: function(xhr, status, error) {
                    // Handle the error in case AJAX fails
                    $('#responseMessage').html('<div class="alert alert-danger">An error occurred: ' + error + '</div>');
                }
            });
        });
    });
</script>