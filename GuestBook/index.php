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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <link rel=icon href=https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.14/svgs/solid/book.svg>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Přehlásit se</a>
                    </li>
                </ul> 
            </div>
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
                    
                    $tmp = 0;

                    while ($row = $result->fetch_assoc()) {
                        if ($tmp == 2) {
                            echo '<div class="row">';
                            echo '<div class="col">';
                            $tmp = 0;
                        }
                        else {
                            echo '<div class="col">';
                        }

                        echo '
                        <div class="card mb-3" style="width: 30rem;">
                            <div class="card-body">
                                <form method="POST" action="php/delete.php" class="d-inline"><button type="submit" name="id" value="'. $row["id_pri"] .'" class="fas fa-times float-right btn btn-success"></button></form>
                                <h5 class="card-title d-inline">'. $row["jmeno"] .' ('. date("d.m.Y H:i", $row["timestamp"]) .')</h5>
                                <p class="mt-1">'; for($i = 0; $i < $row["hodnoceni"]; $i++){ echo "<i class='fas fa-star'></i>"; } echo '</p>
                                <p class="card-text">'. $row["text"] .'</p>
                            </div>
                        </div>
                        ';

                        if ($tmp == 1) {
                            echo '</div></div>';
                        }
                        else {
                            echo '</div>';
                        }
                        $tmp++;
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
                    
                    <div class="row">
                    ';

                    $sql = "SELECT * FROM prispevky ORDER BY timestamp DESC;";
                    $result = $conn->query($sql);
                    
                    $tmp = 0;

                    while ($row = $result->fetch_assoc()) {
                        if ($tmp == 2) {
                            echo '<div class="row">';
                            echo '<div class="col">';
                            $tmp = 0;
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

                        if ($tmp == 1) {
                            echo '</div></div>';
                        }
                        else {
                            echo '</div>';
                        }
                        $tmp++;
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
                    
                    $tmp = 0;

                    while ($row = $result->fetch_assoc()) {
                        if ($tmp == 2) {
                            echo '<div class="row">';
                            echo '<div class="col">';
                            $tmp = 0;
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

                        if ($tmp == 1) {
                            echo '</div></div>';
                        }
                        else {
                            echo '</div>';
                        }
                        $tmp++;
                    }
                }
            ?>
        </div>
    </body>
</html>