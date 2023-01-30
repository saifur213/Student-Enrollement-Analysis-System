<?php
    include '../../conn.php';

    $id     = $_POST['classroom_id'];
    $size  = $_POST['classroom_size'];
   
       
    $query = "INSERT INTO classroom (classroom_id, room_capacity	
	
) VALUES ('$id', '$size')";
    if($conn->query($query) == FALSE){
        header("Location: ../add_classroom.php?response=500");
    }



    header("Location: ../add_classroom.php?response=200");

?>