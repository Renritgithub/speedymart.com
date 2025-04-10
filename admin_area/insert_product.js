const form = document.getElementById('productForm');
  const insertBtn = document.getElementById('insert_product');

  form.onsubmit = (event) => {
    event.preventDefault(); // Prevent form from being submitted normally
  }
    insertBtn.onclick = () => {
    let xhr = new XMLHttpRequest(); // Creating XML object
    xhr.open('POST', "insert_product.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                let responseText = xhr.response; // Clean up the response
                if(responseText==="success"){
                    alert(responseText);
                    console.log("hello");
                }
                 // Display the response as a plain message
            }
        }
    };
    
    let formData = new FormData(form); // Creating a new formData object
    xhr.send(formData);
  };