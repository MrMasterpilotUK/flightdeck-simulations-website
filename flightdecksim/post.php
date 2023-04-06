<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $discord = test_input($_POST["discord"]);
    $why_tester = test_input($_POST["why-tester"]);

    // Add your validation logic here

    // Send an email to the website administrator
    $to = "applications@flightdecksim.com";
    $subject = "New Tester Application";
    $message = "Name: $name\nEmail: $email\nDiscord Username: $discord\n\nWhy do you want to be a tester?\n$why_tester";
    $headers = "From: $email";
    mail($to, $subject, $message, $headers);

    // Redirect the user to a "Thank You" page
    header("Location: thankyou.html");
    exit();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
