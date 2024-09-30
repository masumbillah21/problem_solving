<?php

function isPath($matrix) {
    $N = count($matrix);

    function isSafe($x, $y, $N, $matrix) {
        return $x >= 0 && $x < $N && $y >= 0 && $y < $N && $matrix[$x][$y] === 1;
    }

    function backtrack($x, $y, $N, &$matrix) {
        if ($x === $N - 1 && $y === $N - 1) {
            return true;
        }

        $directions = [[1, 0], [-1, 0], [0, 1], [0, -1]];
        foreach ($directions as $dir) {
            $new_x = $x + $dir[0];
            $new_y = $y + $dir[1];
            if (isSafe($new_x, $new_y, $N, $matrix)) {
                $matrix[$new_x][$new_y] = -1;
                if (backtrack($new_x, $new_y, $N, $matrix)) {
                    return true;
                }
                $matrix[$new_x][$new_y] = 1;
            }
        }
        return false;
    }

    if ($matrix[0][0] === 0) { 
        return false;
    }

    return backtrack(0, 0, $N, $matrix);
}


$matrix1 = [
    [1, 0, 0, 0],
    [1, 1, 0, 1],
    [1, 1, 0, 0],
    [0, 1, 1, 1]
];
var_dump(isPath($matrix1));



// Time Complexity: O(4^(N^2)), where N is the dimension of the grid.
// Space Complexity: O(N^2) for the recursion stack in the worst case.