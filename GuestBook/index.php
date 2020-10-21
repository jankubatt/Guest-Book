<!--
       _               _  __     _           _   
      | |             | |/ /    | |         | |  
      | | __ _ _ __   | ' /_   _| |__   __ _| |_ 
  _   | |/ _` | '_ \  |  <| | | | '_ \ / _` | __|
 | |__| | |_| | | | | | . \ |_| | |_| | |_| | |_ 
  \____/ \__,_|_| |_| |_|\_\__,_|_.__/ \__,_|\__|
-->

<?php 
    include_once("php/conn.php");
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
        <link rel=icon href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.14/svgs/solid/book.svg">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Přehlásit se</a>
                </li>
            </ul> 
        </nav>
    
        <div class="container">
            <h1 class="text-center"><i class="fas fa-book"></i> Návštěvní kniha</h1>
            
            <?php
                if ($_SESSION["admin"] == 1) {
                    echo '
                        <h1>Admin sekce</h1>
                        <div class="row">
                    ';

                    $sql = "SELECT * FROM prispevky ORDER BY timestamp DESC;";
                    $result = $conn->query($sql);
                    
                    $div = 0;
                    while ($row = $result->fetch_assoc()) {
                        if ($div == 2) {
                            echo '<div class="row"><div class="col">';
                            $div = 0;
                        }
                        else {
                            echo '<div class="col">';
                        }

                        echo '
                            <div class="card mb-3" style="width: 29rem;">
                                <div class="card-body">
                                    <form method="POST" action="php/delete.php" class="d-inline"><button type="submit" name="id" value="'. $row["id_pri"] .'" class="fas fa-times float-right btn btn-success"></button></form>
                                    <h5 class="card-title d-inline">'. $row["jmeno"] .' ('. date("d.m.Y H:i", $row["timestamp"]) .')</h5>
                                    <p class="mt-1">'; for($i = 0; $i < $row["hodnoceni"]; $i++){ echo "<i class='fas fa-star'></i>"; } echo '</p>
                                    <p class="card-text">'. $row["text"] .'</p>
                                </div>
                            </div>
                        ';

                        if ($div == 1) {
                            echo '</div></div>';
                        }
                        else {
                            echo '</div>';
                        }
                        $div++;
                    }
                }

                else if ($_SESSION["loggedin"] == 1) {
                    echo '
                        <form method="POST" action="php/create.php" style="margin-bottom: 10em">
                            <div class="form-group">
                                <label>Hodnocení</label>
                                <select class="form-control w-25" name="hodnoceni">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group w-50">
                                <label>Text zprávy</label>
                                <textarea class="form-control" name="text" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="pridat" class="form-control btn btn-success w-25">Přidat</button>
                            </div>
                        </form>
                        
                        <div class="row justify-content-center">
                    ';

                    $sql = "SELECT * FROM prispevky ORDER BY timestamp DESC;";
                    $result = $conn->query($sql);
                    
                    $div = 0;
                    while ($row = $result->fetch_assoc()) {
                        if ($div == 2) {
                            echo '<div class="row justify-content-center"><div class="col-6">';
                            $div = 0;
                        }
                        else {
                            echo '<div class="col-6">';
                        }

                        echo '
                            <div class="card mb-3" style="width: 29rem;">
                                <div class="card-body">
                                    <h5 class="card-title">'. $row["jmeno"] .' ('. date("d.m.Y H:i", $row["timestamp"]) .')</h5>
                                    <p>'; for($i = 0; $i < $row["hodnoceni"]; $i++){ echo "<i class='fas fa-star'></i>"; } echo '</p>
                                    <p class="card-text">'. $row["text"] .'</p>
                                </div>
                            </div>
                        ';

                        if ($div == 1) {
                            echo '</div></div>';
                        }
                        else {
                            echo '</div>';
                        }
                        $div++;
                    }
                }

                else {
                    echo 
                        '<div class="row mb-5">
                            <div class="col text-center">
                                <a href="login.php" type="submit" class="btn btn-success mt-5 text-center" style="width: 10em">Přihlásit se</a>
                            </div>
                        </div>

                        <div class="row">
                    ';

                    $sql = "SELECT * FROM prispevky ORDER BY timestamp DESC;";
                    $result = $conn->query($sql);
                    
                    $div = 0;
                    while ($row = $result->fetch_assoc()) {
                        if ($div == 2) {
                            echo '<div class="row"><div class="col">';
                            $div = 0;
                        }
                        else {
                            echo '<div class="col">';
                        }

                        echo '
                            <div class="card mb-3" style="width: 30rem;">
                                <div class="card-body">
                                    <h5 class="card-title">'. $row["jmeno"] .' ('. date("d.m.Y H:i", $row["timestamp"]) .')</h5>
                                    <p>'; for($i = 0; $i < $row["hodnoceni"]; $i++){ echo "<i class='fas fa-star'></i>"; } echo '</p>
                                    <p class="card-text">'. $row["text"] .'</p>
                                </div>
                            </div>
                        ';

                        if ($div == 1) {
                            echo '</div></div>';
                        }
                        else {
                            echo '</div>';
                        }
                        $div++;
                    }
                }
            ?>
        </div>
    </body>
</html>