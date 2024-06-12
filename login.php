<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=projekt", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $result['id_user'];
        $_SESSION['user_full_name'] = $result['full_name'];
        $_SESSION['type'] = $result['type'];
        header("Location: http://localhost/AEH/homepage.php");
    } else {
        session_unset();
        $_SESSION['error'] = "Zły login lub hasło";
        header("Location: http://localhost/AEH/index.php");
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
