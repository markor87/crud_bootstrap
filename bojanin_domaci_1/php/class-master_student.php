<?php
include "abstract.php";

class MasterStudent extends Student
{
    private $masterThesis;

    public function __construct($name, $lastname, $id, $masterThesis)
    {
        parent::__construct($name, $lastname, $id);
        $this->masterThesis = $masterThesis;
    }

    public function getMasterThesis()
    {
        return $this->masterThesis;
    }
}