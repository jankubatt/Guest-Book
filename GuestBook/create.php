<?php
    include_once("conn.php");
    session_start();

    $hodnoceni = $_POST["hodnoceni"];
    $text = $_POST["text"];
    $jmeno = $_SESSION["jmeno"];
    $date = new DateTime();
    $timestamp = $date->getTimestamp();

    $sql = "INSERT INTO prispevky (hodnoceni, text, jmeno, timestamp) VALUES ('$hodnoceni', '$text', '$jmeno', '$timestamp');";
    $conn->query($sql);

    header("Location: index.php");
    exit();
?>              