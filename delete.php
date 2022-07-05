<?php
    $id = $_POST["id"];
    require_once("connection.php");
    $sql = "DELETE FROM user_details WHERE id = $id";
    if (mysqli_query($con, $sql)) {
        echo ("success");
	} 
	else {
		echo (mysqli_error($con));
	}
    mysqli_close($con);
?>