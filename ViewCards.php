<?php
include 'Common/Functions.php';
session_start();

if (!isset($_SESSION["userID"])) {
    header("Location: ./Login.php");
    exit();
}

class bankCardInstance {

    public $name;
    public $number;
    public $expirationDate;
    public $securityCode;
    public $bank;
    public $owner;

}
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>View Cards</title>
        <link href="./Assets/css/global.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'Common/Header.php'; ?>
        <div class="php-container">
            <h1>View Cards</h1>
            <table class="table">
                <thead>
                <th scope="col">Name</th>
                <th scope="col">Number</th>
                <th scope="col">Expiration Date</th>
                <th scope="col">Security Code</th>
                <th scope="col">Bank</th>
                <th scope="col">Owner</th>
                </thead>
                <tbody>
                    <?php
                    $pdo = getPDO();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM bank_card WHERE Id = :userID";

                    $pdoSafeSearch = $pdo->prepare($sql);
                    $pdoSafeSearch->execute([':userID' => $_SESSION["userID"]]);
                    $bankCardResults = $pdoSafeSearch->fetchAll();

                    $bankCardsArray = array();

//                    echo("<script>console.log('" . $bankCardResults[0][2] . "');</script>");

                    foreach ($bankCardResults as $row) {
                        $bankCardInstance = new bankCardInstance();
                        $bankCardInstance->name = $row[1];
                        $bankCardInstance->number = $row[2];
                        $bankCardInstance->expirationDate = $row[3];
                        $bankCardInstance->securityCode = $row[4];
                        $bankCardInstance->bank = $row[5];
                        $bankCardInstance->owner = $row[6];

                        array_push($bankCardsArray, $bankCardInstance);
                    }

                    foreach ($bankCardsArray as $card) {
                        echo "<tr>";
                        echo "<td>" . $card->name . "</td>";
                        echo "<td>" . $card->number . "</td>";
                        echo "<td>" . $card->expirationDate . "</td>";
                        echo "<td>" . $card->securityCode . "</td>";
                        echo "<td>" . $card->bank . "</td>";
                        echo "<td>" . $card->owner . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php include 'Common/Footer.php'; ?>
    </body>
</html>