<?php

// Rad sa matematickim funkcijama
function calculateGradeStatistics($arr)
{
    $max = max($arr);
    $min = min($arr);
    $avg = array_sum($arr) / count($arr);
    return array($max, $min, $avg);
}
?>