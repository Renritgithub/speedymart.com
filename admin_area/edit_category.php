<?php
include('../includes/connect.php'); // Include your DB connection file
 // Start session for CSRF token

// CSRF token generation
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Fetch category details for editing
$category_title = ''; // Initialize the variable
$edit_id = 0; // Initialize the variable

if (isset($_GET['edit_category'])) {
    $edit_id = intval($_GET['edit_category']); // Make sure it's an integer for security
    $get_category = "SELECT * FROM `categories` WHERE category_id = $edit_id";
    $result = mysqli_query($con, $get_category);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
}
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form id="editCategoryForm" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" class="form-control" required value="<?php echo htmlspecialchars($category_title); ?>">
            <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_id; ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </div>
        <button type="submit" id="update" class="btn btn-info px-3 mb-3">Update Category</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const form = document.getElementById('editCategoryForm');
    
    form.onsubmit = (e) => {
        e.preventDefault(); // Prevent form from submitting

        // Start AJAX
        let xhr = new XMLHttpRequest(); // Creating XML object
        xhr.open('POST', "edit_cat.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = JSON.parse(xhr.responseText);
                    if (data.status === 'success') {
                        alert(data.message); // Show success message
                        categoryData.value = " "; // Clear input on success
                    } else {
                        alert(data.message); // Show error message
                    }
                }
            }
        };

        // Send the form data through AJAX to PHP
        let formData = new FormData(form); // Creating a new FormData object
        xhr.send(formData);
    };
</script>
