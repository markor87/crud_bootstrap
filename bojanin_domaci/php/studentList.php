<?php

// Rad sa nizovima
function studentList($arr)
{
    foreach ($arr as $student) {
        echo "Student ID: " . $student->getStudentID() . " Name: " . $student->getStudentName() . "<br>";
    }
}
?>