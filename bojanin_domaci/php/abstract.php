<?php
include "interface.php";
abstract class Student implements StudentData
{
    private $name;
    private $id;

    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function getStudentName()
    {
        return $this->name;
    }

    public function getStudentID()
    {
        return $this->id;
    }
}