<?php

function hasCycle($A, $B) {
    $graph = array_fill(1, $A, []);
    foreach ($B as $edge) {
        $graph[$edge[0]][] = $edge[1];
    }

    $visited = array_fill(1, $A, false);
    $inRecStack = array_fill(1, $A, false);

    for ($i = 1; $i <= $A; $i++) {
        if (!$visited[$i]) {
            if (dfs($graph, $i, $visited, $inRecStack)) {
                return 1;
            }
        }
    }

    return 0;
}

function dfs($graph, $node, &$visited, &$inRecStack) {
    $visited[$node] = true;
    $inRecStack[$node] = true;

    foreach ($graph[$node] as $neighbor) {
        if (!$visited[$neighbor]) {
            if (dfs($graph, $neighbor, $visited, $inRecStack)) {
                return true;
            }
        } elseif ($inRecStack[$neighbor]) {
            return true;
        }
    }

    $inRecStack[$node] = false;
    return false;
}


$A = 5;
$B = [[1, 2], [4, 1], [2, 4], [3, 4], [5, 2], [1, 3]];
echo hasCycle($A, $B);
echo "\n";
$A = 5;
$B = [ [1, 2], [2, 3], [3, 4], [4, 5] ];
echo hasCycle($A, $B);


// Time Complexity: O(V+E) where V is the number of vertices and E is the number of edges.
// Space Complexity: O(V+E)