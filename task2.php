<?php

function findMin($nums) {
    $left = 0;
    $right = count($nums) - 1;

    while ($left < $right) {
        $mid = (int)(($left + $right) / 2);

        if ($nums[$mid] > $nums[$right]) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }

    return $nums[$left];
}


$nums1 = [3, 4, 5, 1, 2];
echo findMin($nums1);
echo "\n";
$nums2 = [4, 5, 6, 7, 0, 1, 2];
echo findMin($nums2);
echo "\n";
$nums3 = [11, 13, 15, 17];
echo findMin($nums3); 