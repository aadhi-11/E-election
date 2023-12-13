<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // If there are no errors, perform further processing (e.g., save to a database)
    if (empty($errors)) {
        // Simulate further processing
        $response = [
            'success' => true,
            'message' => 'Form submitted successfully!'
        ];
    } else {
        // If there are errors, return error messages
        $response = [
            'success' => false,
            'errors' => $errors
        ];
    }

    echo json_encode($response);
}

// Function to sanitize and validate input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
