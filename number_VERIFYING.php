<?php
// Connect to the database
$mysqli = new mysqli("localhost", "db_user", "db_password", "your_database");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userPhoneNumber = $_POST['phone_number'];  // User's phone number
    $enteredCode = $_POST['verification_code']; // Code entered by the user

    // Fetch the correct code from the database
    $stmt = $mysqli->prepare("SELECT verification_code FROM users WHERE phone_number=?");
    $stmt->bind_param("s", $userPhoneNumber);
    $stmt->execute();
    $stmt->bind_result($correctCode);
    $stmt->fetch();

    // Verify the entered code matches the one in the database
    if ($enteredCode == $correctCode) {
        // Mark the phone as verified
        $stmt = $mysqli->prepare("UPDATE users SET phone_verified=1 WHERE phone_number=?");
        $stmt->bind_param("s", $userPhoneNumber);
        $stmt->execute();

        echo "Phone number successfully verified!";
    } else {
        echo "Incorrect verification code.";
    }
}
?>
