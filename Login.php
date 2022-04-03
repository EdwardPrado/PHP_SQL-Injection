<?php
include 'Common/Functions.php';
session_start();

//Connection to DBO            
$dbConnection = parse_ini_file("Common/db_connection.ini");
extract($dbConnection);
$myPdo = new PDO($dsn, $scriptUser, $scriptPassword);

// Error msg Variables
$validateError = "";
$usernameError = "";
$passwordError = "";

//Submit button:
if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validation
    $invalid = false;

    $pdo = getPDO();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT Id, Password FROM User WHERE Username = '" . $username . "' AND Password = '" . $password . "'";

    $pdoSafeSearch = $pdo->prepare($sql);
    $pdoSafeSearch->execute();
    $user = $pdoSafeSearch->fetch();

    //if entered password matches unhashed db password
    if ($password == $user[1]) {
        $_SESSION["signedIn"] = true;
        $_SESSION["loginStatus"] = "Log Out";
        $_SESSION["username"] = $username;
        $_SESSION['loggedIn'] = $username;
        $_SESSION["userID"] = $user[0];
        header("Location: ViewCards.php");
    } else {
        $_SESSION["validateError"] = "Incorrect student id or password";
        $_SESSION["username"] = null;
        $invalid = true;
    }
}

//Clear button:
if (isset($_POST['clear'])) {
    $_SESSION['username'] = "";
    $_SESSION['password'] = "";
    $_SESSION["enteredUsername"] = "";
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login</title>
        <link href="./Assets/css/global.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'Common/Header.php'; ?>
        <div class="php-container">
            <h1>Login</h1>
            <h4> You need to <a href="NewUser.php">sign up</a> if you are a new user!</h4><br> <br>
            <form method='post' action=Login.php>

                <div class='col-lg-4' style='color:red'> <?php print $validateError; ?></div><br>      
                <div class='form-group row'>
                    <label for='username' class='col-lg-2 col-form-label'><b>Username:</b> </label>
                    <div class='col-lg-4'>
                        <input type='text' class='form-control' id='username' name='username' ></div>
                    <div class='col-lg-4' style='color:red'> <?php print $usernameError; ?></div>
                </div><br> 

                <div class='form-group row'>
                    <label for='password' class='col-lg-2 col-form-label'><b> Password:</b> </label>
                    <div class='col-lg-4'>
                        <input type='password' class='form-control' id='password' name='password' ></div>
                    <div class='col-lg-4' style='color:red'> <?php print $passwordError; ?></div>
                </div><br>

                <div class='form-group row'>                
                    <button type='submit' name='submit' class='btn btn-primary col-lg-1'>Submit</button>
                </div>               
            </form>            
        </div>
        <?php include 'Common/Footer.php'; ?>
    </body>
</html>