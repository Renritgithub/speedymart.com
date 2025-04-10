
     



//popup verification======================
document.getElementById('verificationPopup').style.display = 'block'
const close_popup=document.querySelector('.close');
close_popup.addEventListener('click', () =>{
    document.getElementById('verificationPopup').style.display = 'none';

});
//submit registration form============================

   
    const password = document.getElementById('password').value;
    const passwordRequirements = document.getElementById('passwordRequirements');
    const main=document.querySelector('.main');

    if (!isPasswordStrong(password)) {
    passwordRequirements.style.display = 'block'; // Show requirements
    main.style.height = '538px'; // Set height when requirements are shown
} else {
    passwordRequirements.style.display = 'none'; // Hide requirements
    main.style.height = '500px'; // Reset height when requirements are met
}


    // Continue with the form submission process
    // For example, send the data using AJAX or submit the form
    function registerUser() {
    const userData = {
        f_name: document.getElementById('f_name').value,
        l_name: document.getElementById('l_name').value,
        user_name: document.getElementById('user_name').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        password: document.getElementById('password').value
    };
    const form=document.getElementById('registerForm');
   const registerBtn=document.getElementById('registerBtn');
    form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
    });

    fetch('send_verification_code.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(userData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('registrationSection').style.display = 'none';
            document.getElementById('verificationSection').style.display = 'block';
            alert(data.message); // Notify user that code was sent
        } else {
            alert(data.message); // Show error if sending code fails
        }
    });
}

function verifyCode() {
    const verificationData = {
        phone: document.getElementById('phone').value,
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
            alert(data.message); // Notify user of successful registration
        } else {
            alert(data.message); // Show error if verification fails
        }
    });
}
    

// Function to check password strength
function isPasswordStrong(password) {
    const minLength = 8;
    const specialChars = /[!@#$%^&*(),.?":{}|<>]/; // Regex for special characters
    const upperCase = /[A-Z]/; // Regex for uppercase letters
    const lowerCase = /[a-z]/; // Regex for lowercase letters
    const numbers = /[0-9]/; // Regex for numbers

    return (
        password.length >= minLength &&
        specialChars.test(password) &&
        upperCase.test(password) &&
        lowerCase.test(password) &&
        numbers.test(password)
    );
}

