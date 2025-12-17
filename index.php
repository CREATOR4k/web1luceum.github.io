<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>МГОЛ №3</title>
    <link rel="stylesheet" href="style.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

*{
  margin:0 ;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url('img/temnya_noch.png');
    background-size: cover;
    background-position: center;
}

.container {
    margin: 0 15px;
}

.form-box {
    width: 100%;
    max-width: 450px;
    padding: 30px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: none;
}

.form-box.active {
    display: block;
}

h2 {
    font-size: 34px;
    text-align: center;
    margin-bottom: 20px;
}

input,
select {
    width: 100%;
    padding: 12px;
    background: #eee;
    border-radius: 6px;
    border: none;
    outline: none;
    font-size: 16px;
    color: #333;
    margin-bottom: 20px;
}

button {
    width: 100%;
    padding: 12px;
    background: #708fe4;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    margin-bottom: 20px;
    transition: 0.5s;
}

button:hover {
    background: #6886d8;
}

p {
    font-size: 14.5px;
    text-align: center;
    margin-bottom: 10px;
}

p a {
    color: #6f90ec;
    text-decoration: none;
}

p a:hover {
    text-decoration: underline;
}

.error-message {
    padding: 12px;
    background: #f8d7da;
    border-radius: 6px;
    font-size: 16px;
    color: red;
    text-align: center;
    margin-bottom: 20px;
}

h1 {
    font-size: 50px;   
}

span {
    color: #7594ec;
}

.box p {
    font-size: 22px;
}

.box button {
    display: block;
    width: 300px;
    margin: 0 auto;
} 

.Logout {
    top: 20px;
    font-size: 60px;
    text-align: right;
}
</style>
</head>
<body>
        <div class="container">
            <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
                <form action="login_register.php" method="post">
                    <h2>Логин</h2>
                    <?= showError($errors['login']); ?>
                    <input type="email" name="email" placeholder="email" required>
                    <input type="password" name="password" placeholder="password" required>
                    <button type="submit" name="login">Логин</button>
                    <p>Нету аккаунта? <a href="#" onclick="showForm('register-form')">Зарегестрироваться</a></p>
                </form>
            </div>

            <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
                <form action="login_register.php" method="post">
                    <h2>Регистрация</h2>
                    <?= showError($errors['register']); ?>
                    <input type="text" name="name" placeholder="name" required>
                    <input type="email" name="email" placeholder="email" required>
                    <input type="password" name="password" placeholder="password" required>
                    <select name="role" required>
                        <option value="">Выберете профиль</option>
                        <option value="Химико-биологический">Химико-Биологический</option>
                        <option value="Физико-Математический">Физико-Математический</option>
                        <option value="Математико-Иносторанный">Математико-Иносторанный</option>
                        <option value="Химико-Математический">Химико-Математический</option>
                        <option value="Общественноведческий">Общественноведческий</option>
                        <option value="Педагогический">Педагогический</option>                                        
                    </select>
                    <button type="submit" name="register">Регистрация</button>
                    <p>Уже есть аккаунт? <a href="#" onclick="showForm('login-form')">Войти</a></p>
                </form>
            </div>
        </div>
    <script src="script.js"></script>
</body>
</html>