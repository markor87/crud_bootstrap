<?php

interface StudentData {
    public function getStudentName();
    public function getStudentID();
}

abstract class Student implements StudentData {
    private $name;
    private $id;

    public function __construct($name, $id) {
        $this->name = $name;
        $this->id = $id;
    }

    public function getStudentName() {
        return $this->name;
    }

    public function getStudentID() {
        return $this->id;
    }
}

class Predmet {
    use PredmetIzracunavanje;
    private $name;
    private $grades;
    private static $minPassingGrade = 4;

    public function __construct($name) {
        $this->name = $name;
        $this->grades = array();
    }

    public function addStudentGrade($student, $grade) {
        $this->grades[$student->getStudentID()] = $grade;
    }

    public function getStudentGrade($student) {
        return $this->grades[$student->getStudentID()];
    }

    public static function isGradePassing($grade) {
        return $grade >= self::$minPassingGrade;
    }

    public function getName() {
        return $this->name;
}
}

trait PredmetIzracunavanje {
    public function calculateAverageGrade() {
        $sum = 0;
        $count = 0;
        foreach ($this->grades as $grade) {
            $sum += $grade;
            $count++;
        }
        return $sum / $count;
    }

    public function getPassingStudents() {
        $passingStudents = array();
        foreach ($this->grades as $studentID => $grade) {
            if (Predmet::isGradePassing($grade)) {
                $passingStudents[] = $studentID;
            }
        }
        return $passingStudents;
    }
}

class MasterStudent extends Student {
    private $masterThesis;

    public function __construct($name, $id, $masterThesis) {
        parent::__construct($name, $id);
        $this->masterThesis = $masterThesis;
    }

    public function getMasterThesis() {
        return $this->masterThesis;
    }
}

// Rad sa nizovima
function studentList($arr) {
    foreach ($arr as $student) {
        echo "Student ID: " . $student->getStudentID() . " Name: " . $student->getStudentName()."<br>";
    }
}

// Rad sa matematickim funkcijama
function calculateGradeStatistics($arr) {
    $max = max($arr);
    $min = min($arr);
    $avg = array_sum($arr) / count($arr);
    return array($max, $min, $avg);
}

// Primer korišćenja klasa
$predmet = new Predmet("Programiranje");
$student1 = new MasterStudent("Marko", "1", "Master Thesis Title");
$student2 = new MasterStudent("Bojana", "2", "Master Thesis Title 2");

$predmet->addStudentGrade($student1, 8);
$predmet->addStudentGrade($student2, 7);
$studentList = array($student1, $student2);
studentList($studentList);

$grades = array($predmet->getStudentGrade($student1), $predmet->getStudentGrade($student2));
$gradeStatistics = calculateGradeStatistics($grades);
echo "<br>";
echo "Max grade: " . $gradeStatistics[0] . "<br>";
echo "Min grade: " . $gradeStatistics[1] . "<br>";
echo "Average grade: " . $gradeStatistics[2] . "<br>";

echo "Passing students: " . implode(", ", $predmet->getPassingStudents()) . "<br>";
echo "Average grade for this class: " . $predmet->calculateAverageGrade() . "<br>";

// Prikaz podataka o studentu i oceni na HTML strani
echo "<h1>Student Information</h1>";
echo "Name: " . $student1->getStudentName() . "<br>";
echo "Student ID: " . $student1->getStudentID() . "<br>";
echo "Master Thesis: " . $student1->getMasterThesis() . "<br>";
echo "Subject: " . $predmet->getName() . "<br>";
echo "Grade: " . $predmet->getStudentGrade($student1) . "<br>";
