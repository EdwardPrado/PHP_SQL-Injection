<?php
$LoggedIn = false;
$LoginOut = "Login";
$LoginPage = "Login.php";
$ViewCards = "ViewCards.php";
$AddCard = "AddCard.php";

if (isset($_SESSION['loggedIn'])) {
    $LoggedIn = true;
    $LoginOut = "Logout";
    $LoginPage = "Logout.php";
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Online Course Registration</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./Assets/css/header.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="nav-container bg-dark">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">AC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="Index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $AddCard ?>">Add Card</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $ViewCards ?>">View Cards</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $LoginPage ?>"><?= $LoginOut ?></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>