<?php
    $name = $_POST["name"];
    $address = $_POST["address"];
    $cast = $_POST["cast"];
    $hobbie = $_POST["chooseHobbie"];
    if (isset($_FILES['productImage'])) {
        $filename = $_FILES["productImage"]["name"];
        $tempname = $_FILES["productImage"]["tmp_name"];   
        $folder = "./images/".$filename;
        if (move_uploaded_file($tempname, $folder))  {
            require_once("connection.php");
            $sql = "INSERT INTO user_details (name, address, cast, hobbie, image) VALUES ('$name','$address','$cast','$hobbie','$filename')";
            if (mysqli_query($con, $sql)) {
                echo ("success");
	        } 
	   } else {
        echo '<script>alert("")</script>';
	   }   
    } else {
          echo ('upload failed');
    }
    
    
    mysqli_close($con);
    
?>