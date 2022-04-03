<?php
include 'Common/Functions.php';
session_start();

if (!isset($_SESSION["userID"])) {
    header("Location: ./Login.php");
    exit();
}
//Connection to DBO            
$dbConnection = parse_ini_file("Common/db_connection.ini");
extract($dbConnection);
$myPdo = new PDO($dsn, $scriptUser, $scriptPassword);

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $cardNumber = $_POST["cardNumber"];
    $expirationDate = $_POST["expirationDate"];
    $securityCode = $_POST["securityCode"];
    $bank = $_POST["bank"];

    $pdo = getPDO();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO bank_card (Id, Name, Card_Number, Expiration_Date, Security_Code, Bank, Owner) VALUES( " . $_SESSION["userID"] . ", '" . $name . "', " . (int) $cardNumber . ", '" . $expirationDate . "', " . (int) $securityCode . ", '" . $bank . "', '" . $_SESSION["username"] . "')";
    $pdoSafeSearch = $myPdo->prepare($sql);
    $pdoSafeSearch->execute();
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Add Card</title>
        <link href="./Assets/css/global.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'Common/Header.php'; ?>
        <div class="php-container">
            <h1>Add Card</h1>
            <form method='post' action=AddCard.php>
                <div class='form-group row'>
                    <label for='name' class='col-lg-2 col-form-label'><b>Name:</b> </label>
                    <div class='col-lg-4'>
                        <input type='text' class='form-control' id='name' name='name' ></div>
                </div><br> 

                <div class='form-group row'>
                    <label for='cardNumber' class='col-lg-2 col-form-label'><b>Card Number:</b> </label>
                    <div class='col-lg-4'>
                        <input type='text' class='form-control' id='cardNumber' name='cardNumber' ></div>
                </div><br>

                <div class='form-group row'>
                    <label for='expirationDate' class='col-lg-2 col-form-label'><b> Expiration Date:</b> </label>
                    <div class='col-lg-4'>
                        <input type='date' class='form-control' id='password' name='expirationDate' ></div>
                </div><br>

                <div class='form-group row'>
                    <label for='securityCode' class='col-lg-2 col-form-label'><b> Security Code:</b> </label>
                    <div class='col-lg-4'>
                        <input type='text' class='form-control' id='password' name='securityCode' ></div>
                </div><br>

                <div class='form-group row'>
                    <label for='bank' class='col-lg-2 col-form-label'><b> Bank:</b> </label>
                    <div class='col-lg-4'>
                        <input type='text' class='form-control' id='bank' name='bank' ></div>
                </div><br>

                <div class='form-group row'>                
                    <button type='submit' name='submit' class='btn btn-primary col-lg-1'>Submit</button>
                </div>               
            </form>            
        </div>
        <?php include 'Common/Footer.php'; ?>
    </body>
</html>