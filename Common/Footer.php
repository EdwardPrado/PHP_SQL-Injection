<!--Footer -->
<html>
    <head>
        <link href="./Assets/css/footer.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <footer>
            <div class="container">
                <p>
                    &copy; Algonquin College 2010 – 
                    <?php
                    date_default_timezone_set("America/Toronto");
                    print Date("Y");
                    ?>. 
                    All Rights Reserved
                </p>
            </div>
        </footer>
    </body>
</html>