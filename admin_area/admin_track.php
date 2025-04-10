<!-- Admin Tracking Page -->
<style>
    /* Modal Styling */
.modal {
    display: none; /* Initially hidden */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Ensure it's on top of other elements */
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    width: 300px;
    text-align: center;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

.modal-buttons {
    display: flex;
    justify-content: space-between;
}

button {
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.hidden {
    display: none; /* To hide the modal */
}

.status-container {
    padding: 20px;
    background-color: #f9f9f9;
    margin: 0 auto;
    max-width: 100%;
   
}

.status-header {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.progress-bar {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
    flex-direction: row;
}

.progress-step {
    text-align: center;
    flex-grow: 1;
}

.progress-step .circle {
    background-color: #e0e0e0;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    font-size: 18px;
}

.progress-step span {
    display: block;
    margin-top: 10px;
    font-size: 16px;
}

.progress-step button {
    margin-top: 10px;
    padding: 8px 16px;
    background-color: #2196F3; /* Blue */
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-size: 14px;
}

.progress-step button:disabled {
    background-color: #bdbdbd;
    cursor: not-allowed;
}

.progress-step button:hover {
    background-color: #1976D2;
}
/* Add active styling for the step */
.progress-step.active .circle {
    background-color: green; /* Or any color you want */
}

/* Optional: Add styles for the active step's text */
.progress-step.active span {
    font-weight: bold;
    color: green; /* Or any color you want */
}

 </style>


    <div class="container mt-4">
        <h2 class="mb-3">User Address Details</h2>
        <table id="my-table" class="display table-bordered mt-5  ">
            <thead class="bg-dark text-center text-light">
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>ZIP Code</th>
                </tr>
            </thead>
            <tbody id="userAddressTable" class="text-dark">
                <!-- Data will be inserted here via AJAX -->
            </tbody>
        </table>
    </div>

   

<div class="status-container" id="shipment-status">
    <div class="status-header">Shipment Status</div>
    <div class="progress-bar">
        <div class="progress-step" id="step-processing">
            <div class="circle">1</div>
            <span>Processing</span>
            <button onclick="updateStatus('shipped')" id='mark-shipped-btn'>Mark as Shipped</button>
        </div>
        <div class="progress-step" id="step-shipped">
            <div class="circle">2</div>
            <span>Shipped</span>
            <button onclick="updateStatus('out_for_delivery')">Mark as Out for Delivery</button>
        </div>
        <div class="progress-step" id="step-out-for-delivery">
            <div class="circle">3</div>
            <span>Out for Delivery</span>
            <button onclick="updateStatus('out_for_delivery')" >Confirm Delivery</button>
        </div>
        <div class="progress-step" id="step-delivered">
            <div class="circle">4</div>
            <span>Delivered</span>
            <button onclick="confirmDelivery()"disabled>Already Delivered</button>
        </div>
    </div>
</div>

<!-- Payment Confirmation Modal -->
<div id="payment-modal" class="modal hidden">
    <div class="modal-content">
        <h2>Payment Confirmation</h2>
        <p>Has the customer paid for this order?</p>
        <div class="modal-buttons">
            <button id="confirm-paid" class="btn btn-primary">Yes, Paid</button>
            <button id="cancel-modal" class="btn btn-secondary">Cancel</button>
        </div>
    </div>
</div>
<script>


const confirmDeliveryButton = document.querySelector("#step-out-for-delivery button");
const paymentModal = document.querySelector("#payment-modal");
const confirmPaidButton = document.querySelector("#confirm-paid");
const cancelModalButton = document.querySelector("#cancel-modal");
const circle=document.querySelectorAll('.circle');

const orderId = getQueryParam("product_track");
// Function to confirm delivery
function confirmDelivery() {
    fetch("check_payment_status.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ order_id: orderId }),
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.status === "order_pending") {
            // Show the modal if the order is pending payment
            paymentModal.classList.remove("hidden");
        } else if (data.status === "paid") {
            // If already paid, proceed with delivery confirmation logic
            alert("Order has already been paid.");
            updateStatus('delivered');
        } else {
            console.error(data.message);
        }
    })
    .catch((error) => console.error("Error checking payment status:", error));
}

// Function to update the order status in the database (e.g., mark as delivered)
function updateStatus(newStatus) {
    // Find the parent progress-step of the clicked button
    const step = event.target.closest('.progress-step'); 

    // Reset all progress steps (remove active class from all)
    const allSteps = document.querySelectorAll('.progress-step');
    allSteps.forEach((step) => {
        step.classList.remove('active');
    });

    // Add the active class to the clicked step
    step.classList.add('active');

    // Perform the fetch request (you can add your own logic for the request here)
    fetch("update_order_status.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ order_id: orderId, status: newStatus }),
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.status === "success") {
            alert(data.message);
        } else {
            console.error(data.message);
        }
    })
    .catch((error) => console.error("Error updating order status:", error));
}

// Confirm payment and update the order status
function confirmPayment() {
    fetch("update_payment_status.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ order_id: orderId, confirm_paid: true }),
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.status === "success") {
            alert(data.message);
            paymentModal.classList.add("hidden"); // Hide the modal after confirmation
            updateStatus('delivered'); // Now update the order status to "delivered"
        } else {
            console.error(data.message);
        }
    })
    .catch((error) => console.error("Error confirming payment:", error));
}
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}
// Event Listeners for Modal Buttons
confirmPaidButton.addEventListener("click", confirmPayment);
cancelModalButton.addEventListener("click", () => paymentModal.classList.add("hidden")); // Hide the modal on cancel
</script>
<script>
const order_id = getQueryParam("product_track");
const url = `fetch_user_address.php?order_Id=${order_id}`;

fetch(url, {
    method: "GET",
})
.then(response => response.text()) // Get response as text
.then(text => {
    try {
        let data = JSON.parse(text); // Convert response to JSON

        if (data.success) { // Check if response is valid
            let tableData = "";
            $.each(data.data, function (index, user) {
                tableData += `
                    <tr>
                        <td>${user.user_id}</td>
                        <td>${user.full_name}</td>
                        <td>${user.phone_number}</td>
                        <td>${user.email}</td>
                        <td>${user.address_line1}</td>
                        <td>${user.district}</td>
                        <td>${user.region_name}</td>
                        <td>${user.postal_code}</td>
                    </tr>
                `;
            });

            // ✅ Corrected `document.getElementById`
            document.getElementById("userAddressTable").innerHTML = tableData;

            alert("Success!");
        } else {
            alert("Something went wrong: " + data.error);
        }
    } catch (error) {
        console.error("JSON Parsing Error:", error);
        console.log("Raw Response:", text);
        alert("Invalid JSON response from server.");
    }
})
.catch(error => {
    console.error("Fetch Error:", error);
    alert("Failed to fetch user data!");
});

// Function to get a query parameter by name
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--  <script>
        $(document).ready(function () {
            // Fetch data from the PHP script
            $.ajax({
                url: "fetch_user_address.php",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    let tableData = "";
                    $.each(data, function (index, user) {
                        tableData += `
                            <tr>
                                <td>${user.user_id}</td>
                                <td>${user.name}</td>
                                <td>${user.phone}</td>
                                <td>${user.email}</td>
                                <td>${user.address}</td>
                                <td>${user.city}</td>
                                <td>${user.state}</td>
                                <td>${user.zip_code}</td>
                            </tr>
                        `;
                    });
                    $("#userAddressTable").html(tableData);
                },
                error: function () {
                    alert("Failed to fetch user data!");
                }
            });
        });
    </script> -->
<script>
    let shippingStatusInterval; // To store the interval reference
    const orderShip_id = getQueryParam("product_track"); // Example order ID
let status = "shipped"; // Example status

// Function to send AJAX request
function sendShippingStatusRequest() {
    fetch("send_shipping_cookie.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            order_id: orderShip_id,
            status:status
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Handle the response
        
        if (data.status === "success") {
                // Stop the interval when the cookie is set
                clearInterval(shippingStatusInterval);
                console.log("Cookie set and interval stopped.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
}


// Function to start the interval
function startShippingStatusInterval() {
    shippingStatusInterval = setInterval(() => {
        sendShippingStatusRequest(); // Send the request every minute
    }, 1000); // 60,000 ms = 1 minute
}

// Mark Shipped button click event handler
document.getElementById("mark-shipped-btn").addEventListener("click", function() {
    // Start sending AJAX requests every minute
    startShippingStatusInterval();
});
function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}
</script>