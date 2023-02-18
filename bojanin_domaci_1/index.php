<?php
include "php/class-predmet.php";
include "php/calculateGradeStatistics.php";
include "php/studentList.php";
include "php/class-master_student.php";

// Primer korišćenja klasa
$predmet = new Predmet("PHP Programiranje");
$predmet2 = new Predmet("Međunarodno pravo");
$student1 = new MasterStudent("Marko", "Radovanovic", "1", "Napredno PHP OOP programiranje");
$student2 = new MasterStudent("Bojana", "Modric", "2", "Međunarodno privatno pravo");

$predmet->addStudentGrade($student1, 10);
$predmet->addStudentGrade($student2, 9);
$predmet2->addStudentGrade($student1, 10);
$predmet2->addStudentGrade($student2, 5);
$studentList = array($student1, $student2);

echo "<h1>Statistika fakulteta</h1>";

studentList($studentList);

$grades = array($predmet->getStudentGrade($student1), $predmet->getStudentGrade($student2), $predmet2->getStudentGrade($student1), $predmet2->getStudentGrade($student2));
$gradeStatistics = calculateGradeStatistics($grades);

echo "<br>";
echo "Najveća ocena: " . $gradeStatistics[0] . "<br>";
echo "Najmanja ocena: " . $gradeStatistics[1] . "<br>";
echo "Prosečna ocena svih predmeta: " . $gradeStatistics[2] . "<br>";
echo "<br>";
echo "ID studenata koji su položili minimum jedan predmet: " . implode(", ", $predmet->getPassingStudents()) . "<br>";
echo "Prosečna ocena za " . $predmet->getName(). " je: " . $predmet->calculateAverageGrade() . "<br>";
echo "Prosečna ocena za " . $predmet2->getName(). " je: " . $predmet2->calculateAverageGrade();

// Prikaz podataka o studentu i oceni na HTML strani
echo "<h1>Informacije o studentu</h1>";
echo "Ime: " . $student1->getStudentName() . "<br>";
echo "Prezime: " . $student1->getStudentLastName() . "<br>";
echo "Student ID: " . $student1->getStudentID() . "<br>";
echo "Predmet: " . $predmet->getName() . "<br>";
echo "Master teza: " . $student1->getMasterThesis() . "<br>";
echo "Ocena: " . $predmet->getStudentGrade($student1) . "<br>";
echo "<br>";
echo "Ime: " . $student2->getStudentName() . "<br>";
echo "Prezime: " . $student2->getStudentLastName() . "<br>";
echo "Student ID: " . $student2->getStudentID() . "<br>";
echo "Predmet: " . $predmet2->getName() . "<br>";
echo "Master teza: " . $student2->getMasterThesis() . "<br>";
echo "Ocena: " . $predmet2->getStudentGrade($student2) . "<br>";
