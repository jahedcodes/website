<?php

session_start();

$errors = [];
$pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).{7,}$/";

if($_SERVER["REQUEST_METHOD"] == "POST"){


    $email = trim($_SESSION['email']);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['password2']);
    


    if($name == ''){
        $errors['name'] = "Enter your name.";
    }elseif(strlen($name) < 3){
        $errors['name'] = "the name is less than 3 char";
    }

    if($email == ''){
        $errors['email'] = "Enter your email.";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Enter your email address in the format: ...@example.com.";
    }

    if($password == ''){
        $errors['password'] = "Enter password.";
    }elseif(strlen($password) < 7){
        $errors['password'] = "password too short.";
    }elseif(!preg_match($pattern, $password)){
        $errors['password'] = "Password invalid format.";
    }

    if($password !== $confirm){
        $errors['confirm'] = "password do not match.";
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        $_SESSION['email'] = $email;
        header("Location: complete_profile.php");
    }

    $hash_password = password_hash($password, PASSWORD_DEFAULT); 
    
}

if(empty($errors)){
    $pdo = require_once 'db.php';

    $sql = 'INSERT INTO mydb(name, email, password_hash) VALUES(:name, :email, :password_hash)';

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password_hash' => $hash_password
    ]);
}

?>