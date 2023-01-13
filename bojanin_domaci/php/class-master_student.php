<?php
include "abstract.php";

class MasterStudent extends Student
{
    private $masterThesis;

    public function __construct($name, $id, $masterThesis)
    {
        parent::__construct($name, $id);
        $this->masterThesis = $masterThesis;
    }

    public function getMasterThesis()
    {
        return $this->masterThesis;
    }
}