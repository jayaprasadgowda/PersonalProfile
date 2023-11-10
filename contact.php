<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase"; 
   
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    
    $stmt->close();
    $conn->close();
} else {
    echo "error";
}
?>
