<?php
session_start(); 
include_once '../Model/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getDB();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_query = "SELECT username, password FROM register WHERE username = ?";
    $stmt = $db->prepare($login_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user['password']) { 
            $_SESSION['username'] = $user['username']; 
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username not found'); window.location='login.php';</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>login form</title>
</head>
<body>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0f0f0;
        }
        .container {
            width: 400px;
            padding: 30px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .container_a {
            font-size: 14px;
            text-align: center;   
            margin-top: -10px;  
            margin-bottom: 10px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Login Form</h2>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Username (Email)</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="container_a">
                        <a style="text-decoration: none;" href="register.php">Register here</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
