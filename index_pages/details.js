
    const selectedColorElement = document.getElementById("selected-color");
    const selectedSizeElement = document.getElementById("selected-size");
    const quantityElement = document.getElementById("value");

    // Get product_id from the URL
    const productId = getQueryParam("product_id");

    if (!productId) {
        console.error("Product ID is missing from the URL.");
        return;
    }

    // Event delegation for dynamic elements
    document.addEventListener("click", (e) => {
        // Handle color selection
        if (e.target.matches(".color__link")) {
            const selectedColor = e.target.getAttribute("data-value");
            selectedColorElement.textContent = selectedColor;
            console.log("Selected color:", selectedColor);
        }

        // Handle size selection
        if (e.target.matches(".size__link")) {
            const selectedSize = e.target.getAttribute("data-value");
            selectedSizeElement.textContent = selectedSize;
            console.log("Selected size:", selectedSize);
        }
    });

    // Handle Buy Now button click
    document.getElementById("buy").addEventListener("click", (e) => {
        e.preventDefault();

        const selectedColor = selectedColorElement.textContent;
        const selectedSize = selectedSizeElement.textContent;
        const quantity = parseInt(quantityElement.textContent, 10);

        if (selectedColor === "None" || selectedSize === "None" || isNaN(quantity)) {
            alert("Please select a color, size, and quantity.");
            return;
        }

        fetch("insert_order.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                product_id: productId,
                color: selectedColor,
                size: selectedSize,
                quantity: quantity,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "success") {
                    alert(data.message);
                } else {
                    alert(`Error: ${data.message}`);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("An unexpected error occurred.");
            });
    });

// Function to get a query parameter by name
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}
