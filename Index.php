<?php
session_start();
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Index</title>
        <link href="./Assets/css/global.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'Common/Header.php'; ?>
        <div class="php-container">
            <h1>Store Your Payment Methods</h1><br>
            <p>If you have never used this before, you have to <a href="NewUser.php"> sign up </a>first.</p>

            <p>If you have already signed up, you can<a href="Login.php"> log in </a>now.</p>
        </div>
        <?php include 'Common/Footer.php'; ?>
    </body>
</html>