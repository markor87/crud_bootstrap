<?php
include "interface.php";
abstract class Student implements StudentData
{
    private $name;
    private $lastname;
    private $id;

    public function __construct($name, $lastname, $id)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->id = $id;
    }

    public function getStudentName()
    {
        return $this->name;
    }

    public function getStudentLastName()
    {
        return $this->lastname;
    }

    public function getStudentID()
    {
        return $this->id;
    }
}