<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize incoming POST data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // Create a line with name, email, and timestamp
    $line = $name . " | " . $email . " | " . date('Y-m-d H:i:s') . "\n";

    // Append data to "data.txt" with file locking
    if (file_put_contents("data.txt", $line, FILE_APPEND | LOCK_EX) === false) {
        $error_message = "Failed to save data.";
    } else {
        $success_message = "Thank you, $name! Your details have been saved.";
    }
} else {
    // Not a POST request, redirect or show error
    header("Location: jo.html");
    exit;
}
?>
