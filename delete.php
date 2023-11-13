<?php
if (isset($_GET["learnerid"])) {
    $learnerid = $_GET["learnerid"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myclass";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM learners WHERE learnerid=$learnerid";
    $result = $connection->query($sql);

}

header("location: /myclass/index.php");
exit;
?>
