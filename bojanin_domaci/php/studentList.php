<?php

// Rad sa nizovima
function studentList($arr)
{
    foreach ($arr as $student) {
        echo "Student ID: " . $student->getStudentID() . "; " . " Ime: " . $student->getStudentName() . "; " . " Prezime: " . $student->getStudentLastName() . "<br>";
    }
}
?>