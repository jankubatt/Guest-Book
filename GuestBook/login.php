<!--
       _               _  __     _           _   
      | |             | |/ /    | |         | |  
      | | __ _ _ __   | ' /_   _| |__   __ _| |_ 
  _   | |/ _` | '_ \  |  <| | | | '_ \ / _` | __|
 | |__| | |_| | | | | | . \ |_| | |_| | |_| | |_ 
  \____/ \__,_|_| |_| |_|\_\__,_|_.__/ \__,_|\__|
-->

<?php 
    session_start();

    if (!isset($_SESSION["loggedin"])) {
        $_SESSION["loggedin"] = 0;
    }

    if (!isset($_SESSION["admin"])) {
        $_SESSION["admin"] = 0;
    }
?>

<html>
    <head>
        <title>Návštěvní kniha</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <h1>Přihlásit se</h1>
            
            <form method="POST">
                <div class="form-group w-50">
                    <label>Jméno</label>
                    <input type="text" name="jmeno" class="form-control" required></input>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="form-control btn btn-success w-25">Přihlásit se</button>
                </div>
            </form>

            <?php
                if (isset($_POST["submit"])) {
                    $_SESSION["loggedin"] = 1;
                    $_SESSION["jmeno"] = $_POST["jmeno"];

                    if($_SESSION["jmeno"] == "admin") {
                        $_SESSION["admin"] = 1;
                    }
                    else {
                        $_SESSION["admin"] = 0;
                    }
                    
                    header("Location: index.php");
                    exit();
                }
            ?>
        </div>
    </body>
</html>