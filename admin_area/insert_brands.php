

<h3 class="text-center">Insert Brands</h3>

<form method="POST" class="mb-2 brand" id="brandForm">
    <div class="input-group w-90 mb-3 my-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" id="brand_title" class="form-control" name="brand_title" placeholder="Insert brand" aria-label="Brand Title" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-90 mb-3 bg-info">
        <input type="submit" id="submit_brand" value="Insert Brand" class="bg-info p-3 my-3 border-0">
    </div>
    <div id="responseMessage"></div>
</form>

<script>
    document.getElementById('brandForm').onsubmit = function(e) {
        e.preventDefault(); // Prevent form submission

        const responseMessage = document.getElementById('responseMessage');

        // Start AJAX request
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'insert_brand.php', true);

        xhr.onload = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                responseMessage.innerHTML = response.message;

                if (response.status === 'success') {
                    // Clear the input field on success
                    document.getElementById('brand_title').value = '';
                }
            }
        };

        // Prepare and send the form data
        let formData = new FormData(document.getElementById('brandForm')); // Use FormData object for handling form inputs
        xhr.send(formData);
    };
</script>
