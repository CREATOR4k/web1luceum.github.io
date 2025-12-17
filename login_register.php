<?php

session_start();
require_once 'config.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

$checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
if ($checkEmail->num_rows > 0) {
    $_SESSION['register_error'] = 'Email уже зарегистрирован!';
    $_SESSION['active_form'] = 'register';
} else {
   $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
} 

 header("Location: index.php");
 exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] === 'Химико-биологический') {
                header("Location: XB_page.php");
            } elseif ($user['role'] === 'Физико-Математический'){
                header("Location: FM_page.php");
            } elseif ($user['role'] === 'Математико-Иносторанный') {
                header("Location: MF_page.php");
            } elseif ($user['role'] === 'Химико-Математический') {
                header("Location: XM_page.php");
            }elseif ($user['role'] === 'Общественноведческий') {
                header("Location: O_page.php");
            }else {
                header("Location: Ped_page.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = 'Неправильный email или пароль';
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
}

?>