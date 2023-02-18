<?php
trait PredmetIzracunavanje
{
    public function calculateAverageGrade()
    {
        $sum = 0;
        $count = 0;
        foreach ($this->grades as $grade) {
            $sum += $grade;
            $count++;
        }
        return $sum / $count;
    }

    public function getPassingStudents()
    {
        $passingStudents = array();
        foreach ($this->grades as $studentID => $grade) {
            if (Predmet::isGradePassing($grade)) {
                $passingStudents[] = $studentID;
            }
        }
        return $passingStudents;
    }
}
?>