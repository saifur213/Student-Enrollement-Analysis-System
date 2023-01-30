<?php
    include '../../conn.php';

    $sec     = $_POST['section_no'];
    $sem = $_POST['section_semster'];
    $yr     = $_POST['section_yr'];
    $cap     = $_POST['section_cap'];
    $en     = $_POST['section_en'];
    $blo     = $_POST['section_bloc'];
    $st    = $_POST['section_st'];
    $et     = $_POST['section_et'];
    $day     = $_POST['section_day'];
    $room     = $_POST['section_room'];


    
       
    $query = "INSERT INTO section (cssy_id, section_no, school_id,course_id,faculty_id,	classroom_id,enrolled_student	,	semester,year,section_routine	
) VALUES ('$sec', '$sem','$yr','$cap','$en','$blo','$st','$et','$day','$room')";
    if($conn->query($query) == FALSE){
        header("Location: ../RO/admin-add-section.php?response=500");
    }



    header("Location: ../RO/admin-add-section.php?response=200");

?>