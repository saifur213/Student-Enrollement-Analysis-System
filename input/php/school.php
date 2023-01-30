<?php
    include '../../conn.php';

    $id     = $_POST['school_id'];
    $title  = $_POST['school_title'];
   
       
    $query = "INSERT INTO school (school_id, school_name	
) VALUES ('$id', '$title')";
    if($conn->query($query) == FALSE){
        header("Location: ../add_school.php?response=500");
    }



    header("Location: ../add_school.php?response=200");

?>