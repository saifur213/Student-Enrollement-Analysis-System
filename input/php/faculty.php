<?php
    include '../../conn.php';

    $id     = $_POST['faculty_id'];
    $title  = $_POST['faculty_title'];
    $email  = $_POST['faculty_email'];
   
       
    $query = "INSERT INTO faculty (	faculty_id, faculty_name,email	
) VALUES ('$id', '$title','$email')";
    if($conn->query($query) == FALSE){
        header("Location: ../add_faculty.php?response=500");
    }



    header("Location: ../add_faculty.php?response=200");

?>