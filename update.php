<?php
    $id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $cast = $_POST["cast"];
    $hobbie = $_POST["hobbie"];
    $image= $_POST["image"];
    require_once("connection.php");
    if(image  != ""){
        $sql2 = "UPDATE user_details SET name='$name', address='$address', cast='$cast', hobbie='$hobbie', image='$image' WHERE id=$id";
    }else{
        $sql2 = "UPDATE user_details SET name='$name', address='$address', cast='$cast', hobbie='$hobbie' WHERE id=$id";
    }
   
    if (mysqli_query($con, $sql2)) {
        echo ("success");
    } else {
        echo (mysqli_error($con));
    }    
    mysqli_close($con);
?>