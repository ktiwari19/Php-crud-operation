<?php
    $id = $_POST["id"];
    require_once("connection.php");
    $sql = "SELECT * FROM user_details WHERE id=$id";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($res);
    echo json_encode($data);
    mysqli_close($con);
?>
