<!--
       _               _  __     _           _   
      | |             | |/ /    | |         | |  
      | | __ _ _ __   | ' /_   _| |__   __ _| |_ 
  _   | |/ _` | '_ \  |  <| | | | '_ \ / _` | __|
 | |__| | |_| | | | | | . \ |_| | |_| | |_| | |_ 
  \____/ \__,_|_| |_| |_|\_\__,_|_.__/ \__,_|\__|
-->

<?php
    include_once("conn.php");
    $id = $_GET["id"];

    $sql = "DELETE FROM prispevky WHERE id_pri='$id';";
    $conn->query($sql);

    header("Location: ../index.php");
    exit();
?>