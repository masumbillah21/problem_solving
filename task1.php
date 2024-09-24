<?php

function maximumUnits($boxTypes, $truckSize) {
    usort($boxTypes, function($a, $b) {
        return $b[1] - $a[1];
    });
    
    $totalUnits = 0;
    
    foreach ($boxTypes as $box) {
        list($numberOfBoxes, $unitsPerBox) = $box;
        
        if ($truckSize <= 0) {
            break;
        }
        
        $boxesToTake = min($numberOfBoxes, $truckSize);
        
        $totalUnits += $boxesToTake * $unitsPerBox;
        
        $truckSize -= $boxesToTake;
    }
    
    return $totalUnits;
}

$boxTypes1 = [[1, 3], [2, 2], [3, 1]];
$truckSize1 = 4;
echo maximumUnits($boxTypes1, $truckSize1) . "\n";

$boxTypes2 = [[5, 10], [2, 5], [4, 7], [3, 9]];
$truckSize2 = 10;
echo maximumUnits($boxTypes2, $truckSize2) . "\n";


// Time complexity: O(nlogn)
// Space complexity: O(1) (O(n) used by the sorting algorithm in the worst case)