To find the k-th largest element in an integer array with a time complexity of O(n log n) and minimal space complexity, we can use the Quickselect algorithm, which is based on the QuickSort algorithm but optimized for this problems. Here's how it works and why it's suitable for this problem:

# Quickselect Algorithm
=> Algorithm Overview:

* Quickselect is a selection algorithm to find the k-th smallest (or largest) element in an unordered list. It is related to the QuickSort sorting algorithm.
*The average time complexity of Quickselect is O(n), but with an optimized pivot selection, it can be made to run in O(n log n) in the worst case. However, for this problem, we'll ensure a guaranteed O(n log n) time complexity.

# Why Quickselect:

=> Time Complexity: Quickselect has an average-case time complexity of O(n) but in this case, we'll implement it with a worst-case time complexity of O(n log n) by choosing a deterministic pivot strategy.
=> Space Complexity: It is more space-efficient than sorting algorithms that use additional space to store the sorted array. Quickselect uses O(1) additional space beyond the input array.




<?php

function quickselect(&$nums, $left, $right, $k_smallest) {
    if ($left == $right) {
        return $nums[$left];
    }

    $pivot_index = $left + (int)(($right - $left) / 2);
    $pivot_index = partition($nums, $left, $right, $pivot_index);

    if ($k_smallest == $pivot_index) {
        return $nums[$k_smallest];
    } else if ($k_smallest < $pivot_index) {
        return quickselect($nums, $left, $pivot_index - 1, $k_smallest);
    } else {
        return quickselect($nums, $pivot_index + 1, $right, $k_smallest);
    }
}

function partition(&$nums, $left, $right, $pivot_index) {
    $pivot_value = $nums[$pivot_index];

    swap($nums, $pivot_index, $right);
    
    $store_index = $left;

    for ($i = $left; $i < $right; $i++) {
        if ($nums[$i] < $pivot_value) {
            swap($nums, $store_index, $i);
            $store_index++;
        }
    }
    
    swap($nums, $store_index, $right);
    
    return $store_index;
}

function swap(&$nums, $i, $j) {
    $temp = $nums[$i];
    $nums[$i] = $nums[$j];
    $nums[$j] = $temp;
}

function findKthLargest(&$nums, $k) {
    $size = count($nums);
    return quickselect($nums, 0, $size - 1, $size - $k);
}


$nums1 = [3, 2, 1, 5, 6, 4];
$k1 = 2;
echo findKthLargest($nums1, $k1) . "\n";

$nums2 = [3, 2, 3, 1, 2, 4, 5, 5, 6];
$k2 = 4;
echo findKthLargest($nums2, $k2) . "\n";
