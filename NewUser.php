<?php
include 'Common/Functions.php';

//Connection to DBO            
$dbConnection = parse_ini_file("Common/db_connection.ini");
extract($dbConnection);
$myPdo = new PDO($dsn, $scriptUser, $scriptPassword);

// Error msg variables
$userError = "";
$nameError = "";
$phoneNumberError = "";
$passwordError = "";
$validateError = "";
$passwordAgainError = "";

//Submit button:
if (isset($_POST['submit'])) {
    $submitStatus = true;

    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordAgain = $_POST["passwordAgain"];


    if ($submitStatus) {   //Add user then redirect
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO User (Username, Password) VALUES( '" . $username . "', '" . $password . "')";

        $pdoSafeSearch = $myPdo->prepare($sql);

        if ($pdoSafeSearch->execute()) {
            $_SESSION['loggedIn'] = $username;
            $_SESSION["signedIn"] = true;
            $_SESSION["loginStatus"] = "Log Out";
            $_SESSION["username"] = $username;
            header("Location: ViewCards.php");
        }
    }
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Register</title>
        <link href="./Assets/css/global.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'Common/Header.php'; ?>
        <div class="php-container">
            <h1>Sign Up</h1>
            <h4> All fields are required:</h4><br> <br>     

            <form method='post' action=NewUser.php>        
                <div class='col-lg-4' style='color:red'> <?php print $validateError; ?></div><br>        
                <div class='form-group row'>
                    <label for='username' class='col-lg-2 col-form-label'><b> Username:</b> </label>
                    <div class='col-lg-4'>
                        <input type='text' class='form-control' id='username'  name='username' ></div>
                    <div class='col-lg-4' style='color:red'> <?php print $userError; ?></div>
                </div><br>  

                <div class='form-group row'>
                    <label for='password' class='col-lg-2 col-form-label'><b>Password:</b> </label>
                    <div class='col-lg-4'>
                        <input type='text' class='form-control' id='password'  name='password' ></div>
                    <div class='col-lg-4' style='color:red'> <?php print $passwordError; ?></div>
                </div><br>

                <div class='form-group row'>
                    <label for='passwordAgain' class='col-lg-2 col-form-label'><b>Password Again:</b> </label>
                    <div class='col-lg-4'>
                        <input type='text' class='form-control' id='passwordAgain' name='passwordAgain' ></div>
                    <div class='col-lg-4' style='color:red'> <?php print $passwordAgainError; ?></div>
                </div><br>


                <div class='form-group row'>                
                    <button type='submit' name='submit' class='btn btn-primary col-lg-1'>Submit</button>
                </div>               
            </form>
        </div>
        <?php include 'Common/Footer.php'; ?>
    </body>
</html>