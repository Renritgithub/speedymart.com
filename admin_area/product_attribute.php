<?php
include "../includes/connect.php";
if(isset($_GET['product_attribute'])){
    $product_id=htmlspecialchars($_GET['product_attribute']);
}
?>

<div class="container mt-3">
    <h1 class="text-center">Insert Attributes</h1>
    <form method="post" enctype="multipart/form-data" id="attribute_form" onsubmit="submitForm(event)">
        <div class="form-outline w-50 m-auto mb-4">
            <label class="form-label">Stock</label>
            <input type="text" class="form-control" required name="stock" placeholder="Enter stock">
        </div>
        
        <div class="form-outline w-50 m-auto mb-4" id="variation_section">
            <div class="variation_group">
                <label for="attribute_type" class="form-label text-center">Select Attribute Type</label>
                <select name="attribute_type[]" class="form-select">
                    <option value="Color">Color</option>
                    <option value="Size">Size</option>
                </select>

                <div class="form-outline mt-3">
                    <label class="form-label">Enter Attribute Value:</label>
                    <input type="text" class="form-control" required name="attribute_values[0][]" placeholder="Enter a value (e.g., Red)">
                </div>
                
                <div class="form-outline mt-3">
                    <label class="form-label">Price Increase:</label>
                    <input type="text" class="form-control" required name="price_values[0][]" placeholder="Enter the increase price">
                </div>
            </div>
        </div>
        
        <div class="text-center mt-3">
            <button type="button" class="btn btn-info px-3 mb-3" onclick="addVariationInput()">Add Variation</button>
        </div>
        
        <input type="hidden" value="<?php echo $product_id; ?>" name="product_id">
        <div class="text-center mt-3">
            <input type="submit" class="btn btn-info px-3 mb-3" value="Submit">
        </div>
    </form>
</div>

<script>
let variationCount = 1;

function addVariationInput() {
    const variationSection = document.getElementById('variation_section');
    const newVariationGroup = document.createElement('div');
    newVariationGroup.classList.add('variation_group', 'mt-3');

    newVariationGroup.innerHTML = `
        <label for="attribute_type" class="form-label text-center">Select Attribute Type</label>
        <select name="attribute_type[]" class="form-select">
            <option value="Color">Color</option>
            <option value="Size">Size</option>
        </select>
        
        <div class="form-outline mt-3">
            <label class="form-label">Enter Attribute Value:</label>
            <input type="text" class="form-control" required name="attribute_values[${variationCount}][]" placeholder="Enter a value (e.g., Red)">
        </div>
        
        <div class="form-outline mt-3">
            <label class="form-label">Price Increase:</label>
            <input type="text" class="form-control" required name="price_values[${variationCount}][]" placeholder="Enter the increase price">
        </div>
    `;
    variationSection.appendChild(newVariationGroup);
    variationCount++;
}

function submitForm(event) {
    event.preventDefault();

    const form = document.getElementById('attribute_form');
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "product_attr.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let data = xhr.response.trim();
            if (data === 'success') {
                alert('Attributes added successfully!');
            } else {
                alert('Error: ' + data);
            }
        }
    };

    let formData = new FormData(form);
    xhr.send(formData);
}
</script>
