<?php

function search($nums, $target) {
    $left = 0;
    $right = count($nums) - 1;

    while ($left <= $right) {
        $mid = (int)(($left + $right) / 2);

        if ($nums[$mid] === $target) {
            return $mid;
        } elseif ($nums[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return -1;
}


$nums1 = [-1, 0, 3, 5, 9, 12];
$target1 = 9;
echo search($nums1, $target1);
echo "\n";
$nums2 = [-1, 0, 3, 5, 9, 12];
$target2 = 2;
echo search($nums2, $target2);
