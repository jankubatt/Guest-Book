<?php
    include_once("conn.php");
    session_start();

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $hodnoceni = $_POST["hodnoceni"];
    $text = test_input($_POST["text"]);
    $jmeno = $_SESSION["jmeno"];

    $sql = "INSERT INTO prispevky (hodnoceni, text, jmeno) VALUES ('$hodnoceni', '$text', '$jmeno');";
    $conn->query($sql);

    header("Location: ../index.php");
    exit();
?>              