<?php
include "trait.php";
class Predmet
{
    use PredmetIzracunavanje;

    private $name;
    private $grades;
    private static $minPassingGrade = 4;

    public function __construct($name)
    {
        $this->name = $name;
        $this->grades = array();
    }

    public function addStudentGrade($student, $grade)
    {
        $this->grades[$student->getStudentID()] = $grade;
    }

    public function getStudentGrade($student)
    {
        return $this->grades[$student->getStudentID()];
    }

    public static function isGradePassing($grade)
    {
        return $grade >= self::$minPassingGrade;
    }

    public function getName()
    {
        return $this->name;
    }
}