<?php

function permute($str) {
    $result = [];
    $arr = str_split($str);

    function backtrack(&$arr, $start, &$result) {
        if ($start === count($arr)) {
            $result[] = implode('', $arr); 
            return;
        }
        for ($i = $start; $i < count($arr); $i++) {
            swap($arr, $start, $i);
            backtrack($arr, $start + 1, $result);
            swap($arr, $start, $i);
        }
    }

    function swap(&$arr, $i, $j) {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    backtrack($arr, 0, $result);
    return $result;
}

print_r(permute("abc"));

//print_r(permute("xy"));

// Time Complexity: O(n!)
// Space Complexity: O(n) for the recursion stack, and O(n!) for the resulting array of permutations.