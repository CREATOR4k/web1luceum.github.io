<?php

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Физико-Математический профиль</title>
    <style>
body {
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url(img/temnya_noch.png) no-repeat;
    background-size: cover;
    background-position: center;
}

h1 {
    font-size: 50px;  
    color:rgb(255, 255, 255); 
    text-align: center;
}

p {
    color:rgb(255, 255, 255);
    font-size: 22px;
    text-align: center;
}
.namespace {
    color: rgb(255, 255, 255);
    display: inline-block;
    text-align: center;
}



.out {
    font-size: 20px;
    cursor: pointer;
    text-align: right;
    color:rgb(255, 255, 255);
    justify-self: start;
    align-items: end;
    padding: 10px 20px;
    border: none;
    margin-left: auto;
    border-radius: 5px;
    background-color:rgb(224, 63, 52);   
}
.out:hover {
    box-shadow: none;
    position: relative;
    top: 5px;
}

span {
    color:rgb(0, 255, 191);
    text-decoration: none;
    font-size: 35px;
}

.btn {
    cursor: pointer;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 25px;
    width: 180px;
    height: 40px;
    border-radius: 10px;
    transition: .2s linear;
    position: relative;
    top: 0;
    left: 0;
    background-color: #f44336;
}

.btn:hover {
    box-shadow: 2px 2px white, 4px 4px #2f7392;
    color: red;
    top: -4px;
    left: -4px;
}

.q {
    color: #ffffff;
}

.box {
    background-image: linear-gradient(rgb(160, 45, 45),rgb(80, 34, 34) );
    border-radius: 20px;
}
    </style>
</head>
<body>
        <div class="out" onclick="window.location.href='logout.php'">Выйти</div>
        <div class ="box">
            <h1>Привет, <div class="namespace"><?=$_SESSION['name']; ?></div> .</h1>
        <p> Это страница <span>Химико-биологического</span> Профиля </p>
        <div class="btn"><a href="https://forms.gle/jaBcX1gBK7XASFNE8" style="text-decoration: none;"><p class="q">Пройти тест</p></a></div>
</body>
</html>
       
        
        
        
