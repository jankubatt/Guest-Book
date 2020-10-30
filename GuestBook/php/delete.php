<?php
    include_once("conn.php");
    $id = $_GET["id"];

    $sql = "DELETE FROM prispevky WHERE id_pri='$id';";
    $conn->query($sql);

    header("Location: ../index.php");
    exit();
?>