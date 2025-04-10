<?php
session_start();

// Function to generate a CSRF token
function generateCsrfToken() {
    // Create a new CSRF token and store it in the session
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Generate CSRF token if not already set
if (empty($_SESSION['csrf_token'])) {
    generateCsrfToken();
}
$redirect=isset($_GET['redirect'])? $_GET['redirect'] : 'index.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
       html, body {
        height: 100%;
          margin: 0; /* Remove default margin */
        }


        .reg_login{
        width:100%;
        height:100%;
        display:flex;
        align-items: center;
        justify-content:center;
       background: linear-gradient(to right, hsl(0, 18%, 78%), hsl(0, 3%, 94%));
       }

      
    .main {
    width: 350px;
    height: 500px;
    background: url('user_images/login.png') no-repeat center / cover;
    border-radius: 10px;
    box-shadow: 5px 20px 50px #000;
    max-width:500px;
    overflow: hidden;
    max-height:600px;

    
  }

   #chk {
    display: none;
   }

    .signup {
    position: relative;
    width: 100%;
    height: 100%;
   }

   label {
    color: #fff;
    font-size: 2.3rem;
    justify-content: center;
    display: flex;
    margin: 25px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.5s;
   }

   input {
    width: 60%;
    height: 20px;
    background: hsl(0, 14%, 83%);
    justify-content: center;
    display: flex;
    margin: 10px auto;
    padding: 10px;
    border: none;
    outline: none;
    border-radius: 5px;
   }

   button {
    width: 60%;
    height: 40px;
    margin: 10px auto;
    justify-content: center;
    display: block;
    color: #fff;
    background:hsl(10, 58%, 54%);
    font-size: 1em;
    font-weight: bold;
    margin-top: 20px;
    outline: none;
    border: none;
    border-radius: 5px;
    transition: 0.2s ease-in;
    cursor: pointer;
   }

    button:hover {
    background: hsl(0, 48%, 68%);
   }

    .login {
    height: 470px;
    background: #fff;
    border-radius: 60% / 10%;
    transform: translateY(-100px);
    transition: 0.8s ease-in-out;
    margin-top:40px;
   }

   .login label {
    color: hsl(10, 58%, 54%);
    transform: scale(0.6);
   }

    #chk:checked ~ .login {
    transform: translateY(-500px);
    }

   #chk:checked ~ .login label {
    transform: scale(1);
    }

   #chk:checked ~ .signup label {
    transform: scale(0.6);
   }
   .input {
    opacity: 0; /* Start hidden */
    transition: opacity 0.7s ease; /* Transition opacity over 0.5 seconds */
    height: auto; /* Prevent collapsing when hidden */
   }

   .input.show {
    opacity: 1; /* Show by increasing opacity */
   }
   .pwd_wrapper{
    position: relative;
   }
   .pwd_wrapper i{
    position:absolute;
   right:17.5%;
   top:35%;
   cursor: pointer;
   } 

   .popup {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.5); /* Black w/ opacity */
   }

   .popup-content {
    background-color: #fff;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 300px; /* Could be more or less, depending on screen size */
    }

   .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
   }

   .close:hover,
   .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
   }

</style>
</head>
<body>
    <div class="reg_login">

        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">
    
            <div class="signup">
                <form action="" id="registerForm" >
                    <label for="chk" aria-hidden="true">Sign Up</label>
                    <input type="text" id="f_name" placeholder="first name" required>
                    <input type="text" id="l_name" placeholder="last name" required>
                    <input type="text" id="user_name" placeholder="user name" required>
                    <input type="text" id="email" placeholder="Email" required>
                    <input type="hidden" id="role" value='user'>
                    <input type="text" id="phone" placeholder="Phone number" required>
                    <div class="pwd_wrapper">
                        <input type="password" id="password" placeholder="password" required class="pwd">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <small id="passwordRequirements" style="color: red; display: block; text-align: center; ">
                       
                    </small>
                    <button type='submit' onclick="registerUser()">Sign up</button>
                </form>
            </div>
        
            <div class="login" id="loginForm">
                <span id="countdownTimer" style="text-align:center; color:red;"></span>
                
                <form action="">
                    <label for="chk" aria-hidden="true">Login</label>
                    <div class="input">
                        <input type="text" name="email" placeholder="Email" id="loginEmail"required>
                        <input type="hidden" id="csrf_token" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
                        <div class="pwd_wrapper">
                            <input type="password" name="password" placeholder="password" id="loginPassword" required class="pwd">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                       <button onclick="login_credential()">Login</button>
    
                   </div>
                    
                </form>
            </div>
        </div>
        <!-- verification popup -->
    
        <div id="verificationPopup" class="popup">
            <div class="popup-content">
                <span class="close">&times;</span>
                <h2>Verify Your Phone Number</h2>
                <input type="text" name="verification_code" id="verificationCode" placeholder="Verification Code" required>
                <button onclick="verifyCode()">Verify Code</button>
                <div id="verificationMessage"></div>
            </div>
        </div>

    </div>
    <script>

const pwdloginField = document.querySelector(".login .pwd_wrapper input[type='password']");
const logintoggleBtn = document.querySelector(".login .pwd_wrapper i");

logintoggleBtn.onclick = () => {
    if (pwdloginField.type === "password") {
        // Show the password
        pwdloginField.type = "text";
        logintoggleBtn.classList.add("active");
        logintoggleBtn.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        // Hide the password
        pwdloginField.type = "password";
        logintoggleBtn.classList.remove("active");
        logintoggleBtn.classList.replace("fa-eye-slash", "fa-eye");
    }
};


const pwdField = document.querySelector(".pwd_wrapper input[type='password']");
const toggleBtn = document.querySelector(".pwd_wrapper i");

toggleBtn.onclick = () => {
    if (pwdField.type === "password") {
        // Show the password
        pwdField.type = "text";
        toggleBtn.classList.add("active");
        toggleBtn.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        // Hide the password
        pwdField.type = "password";
        toggleBtn.classList.remove("active");
        toggleBtn.classList.replace("fa-eye-slash", "fa-eye");
    }
};


document.addEventListener('DOMContentLoaded', () => {
    const input = document.querySelector('.input'); // Assuming you want to show/hide this
    const check = document.getElementById('chk');
    
    // Initial check on page load
    if (check.checked) {
        input.classList.add('show');
    } else {
        input.classList.remove('show');
    }
    
    // Event listener to toggle class on checkbox change
    check.addEventListener('change', () => {
        input.classList.toggle('show', check.checked);
    });
});


    </script>
    
<script>
     



//popup verification======================

const close_popup=document.querySelector('.close');
close_popup.addEventListener('click', () =>{
    document.getElementById('verificationPopup').style.display = 'none';

});

//submit registration form============================

   
    const password = document.getElementById('password').value;
    const passwordRequirements = document.getElementById('passwordRequirements');
    const main=document.querySelector('.main');
// Debounce function



// Debounce function
function debounce_password(func, delay) {
    let timeout;
    return function(...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), delay);
    };
}

// Password strength checker
function checkPasswordStrength(password) {
    let text = '';
    if(password.length==0){
        text = '';
    }else{
        if (password.length < 6) {
        text = 'Too short';
    } else if (password.length < 10) {
        text = 'It is a very weak password';
    } else if (password.match(/[A-Z]/) && password.match(/[0-9]/) && password.match(/[!@#$%^&*(),.?":{}|<>]/) && password.match(/[a-z]/)) {
        text = 'Your password is very strong';
        document.getElementById('passwordRequirements').style.color='green';
    } else {
        text = 'Your password has Moderate security';
    }
        
    }

    
    
    // Make sure to use the correct property to update the element
    document.getElementById('passwordRequirements').textContent = text;
}

// Debounced version of the password strength checker
const debouncedCheckPasswordStrength = debounce_password(checkPasswordStrength, 300);

// Attach event listener to the password input field
document.getElementById('password').addEventListener('keyup', (event) => {
    const password = event.target.value;
    debouncedCheckPasswordStrength(password);
});



    // Continue with the form submission process
    // For example, send the data using AJAX or submit the form
    function registerUser() {
    const userData = {
        f_name: document.getElementById('f_name').value,
        l_name: document.getElementById('l_name').value,
        user_name: document.getElementById('user_name').value,
        email: document.getElementById('email').value,
        role: document.getElementById('role').value,
        phone: document.getElementById('phone').value,
        password: document.getElementById('password').value
    };
    const form=document.getElementById('registerForm');
   const registerBtn=document.getElementById('registerBtn');
    form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
    });

    fetch('send_otp.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(userData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('verificationPopup').style.display = 'block';
            alert(data.message); // Notify user that code was sent
        } else {
            alert(data.message); // Show error if sending code fails
        }
    });
}

function verifyCode() {
    const verificationData = {
        code: document.getElementById('verificationCode').value
    };

    fetch('verify_code.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(verificationData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('verificationPopup').style.display = 'none';
            alert(data.message); // Notify user of successful registration
        } else {
            alert(data.message); // Show error if verification fails
        }
    });
}
 
document.getElementById('password')
// Function to check password strength


document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
});

function startCountdown(waitTime) {
    const timerDisplay = document.getElementById("countdownTimer");
    let timeLeft = waitTime;

    const timerInterval = setInterval(() => {
        if (timeLeft > 0) {
            timeLeft -= 1;
            timerDisplay.innerText = `Please wait ${timeLeft} seconds before trying again.`;
        } else {
            clearInterval(timerInterval);
            timerDisplay.innerText = ""; // Clear the message after countdown
            // Optionally re-enable the login button or form here
        }
    }, 1000);
}
function login_credential() {
    const loginData = {
        email: document.getElementById('loginEmail').value,
        password: document.getElementById('loginPassword').value,
        csrf_token: document.getElementById('csrf_token').value // Pass CSRF token
    };

    fetch('login.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(loginData)
})
.then(response => response.json())

.then(data => {
    if(data.success){
        console.log(data.userToken);

        alert(data.message);
        let redirectUrl = "<?php echo $redirect; ?>";
        window.location.href = redirectUrl;

    }else{
        if(!data.success && data.wait_time){
            startCountdown(data.wait_time);
        }
        alert(data.message);

    }
    
})

}


    </script>
    
</body>
</html>

