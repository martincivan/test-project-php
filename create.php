<?php

$app = require "./core/app.php";

// Create new instance of user
$user = new User($app->db);
// Insert it to database with POST data
try {
    $user->insert(array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'city' => $_POST['city'],
        'phone' => $_POST['phone']
    ));
} catch (InvalidArgumentException $e) {
    // Redirect back to index with error message
    header('Location: index.php?error=' . $e->getMessage());
    http_response_code(400);
    echo $e->getMessage();
    exit;
}


// Redirect back to index
header('Location: index.php');