<?php
include('../includes/connect.php'); // Include your DB connection file
 // Start session for CSRF token

// CSRF token generation
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Fetch brand details for editing
$brand_title = ''; // Initialize the variable
$edit_id = 0; // Initialize the variable

if (isset($_GET['edit_brand'])) {
    $edit_id = intval($_GET['edit_brand']); // Make sure it's an integer for security
    $stmt = $con->prepare("SELECT * FROM `brand` WHERE brand_id = ?"); // Prepare the SQL statement
    $stmt->bind_param('i', $edit_id); // Bind the parameter (integer type)
    $stmt->execute(); // Execute the statement
    $result = $stmt->get_result(); // Get the result set from the query
    $row = $result->fetch_assoc(); // Fetch the result as an associative array
    $brand_title = $row['brand_title']; // Access the 'brand_title' from the result

}
?>

<div class="container mt-3">
    <h1 class="text-center">Edit brand</h1>
    <form id="editbrandForm" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required value="<?php echo htmlspecialchars($brand_title); ?>">
            <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_id; ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </div>
        <button type="submit" id="update" class="btn btn-info px-3 mb-3">Update brand</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const form = document.getElementById('editbrandForm');
    
    form.onsubmit = (e) => {
        e.preventDefault(); // Prevent form from submitting

        // Start AJAX
        let xhr = new XMLHttpRequest(); // Creating XML object
        xhr.open('POST', "edit_bra.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = JSON.parse(xhr.responseText);
                    if (data.status === 'success') {
                        alert(data.message); // Show success message
                        brandData.value = ""; // Clear input on success
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
