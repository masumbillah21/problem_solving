<?php

function maxDisjointIntervals($A) {
   
    usort($A, function($a, $b) {
        return $a[1] - $b[1];
    });
    
    $count = 0;
    $lastEnd = -1; 
    
    foreach ($A as $interval) {
        
        if ($interval[0] > $lastEnd) {
            $count++;
            $lastEnd = $interval[1];
        }
    }
    
    return $count;
}


$intervals1 = [[1, 4], [2, 3], [4, 6], [8, 9]];
echo maxDisjointIntervals($intervals1) . "\n";

$intervals2 = [[1, 9], [2, 3], [5, 7]];
echo maxDisjointIntervals($intervals2) . "\n";


// Time complexity: O(nlogn)
// Space complexity: O(1)