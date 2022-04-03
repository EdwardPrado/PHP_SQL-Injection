<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Logout</title>
        <link href="./Assets/css/global.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'Common/Header.php'; ?>
        <div class="php-container">
            <h1>Logout</h1>
            <?php
            session_destroy();
            header('Location: Index.php');
            exit;
            ?>
        </div>
        <?php include 'Common/Footer.php'; ?>
    </body>
</html>