<?php
function countPathsWithGoodNodes($A, $B, $C) {
    $N = count($A);
    $graph = array_fill(1, $N, []);
    
    foreach ($B as $edge) {
        $graph[$edge[0]][] = $edge[1];
        $graph[$edge[1]][] = $edge[0];
    }

    $visited = array_fill(1, $N, false);
    return dfs(1, $A, $C, 0, $visited, $graph);
}

function dfs($node, $A, $C, $goodCount, &$visited, $graph) {
    $visited[$node] = true;

    if ($A[$node - 1] == 1) {
        $goodCount++;
    }

    if ($goodCount > $C) {
        $visited[$node] = false;
        return 0;
    }

    $isLeaf = true;
    $totalPaths = 0;

    foreach ($graph[$node] as $neighbor) {
        if (!$visited[$neighbor]) {
            $isLeaf = false;
            $totalPaths += dfs($neighbor, $A, $C, $goodCount, $visited, $graph);
        }
    }

    if ($isLeaf) {
        $totalPaths = 1;
    }

    $visited[$node] = false;
    return $totalPaths;
}

$A = [0, 1, 0, 1, 1, 1];
$B = [[1, 2], [1, 5], [1, 6], [2, 3], [2, 4]];
$C = 1;

echo countPathsWithGoodNodes($A, $B, $C);

echo "\n";

$A = [0, 1, 0, 1, 1, 1];
$B = [ [1, 2], [1, 5], [1, 6], [2, 3], [2, 4] ];
$C = 2;

echo countPathsWithGoodNodes($A, $B, $C);

// Time Complexity: O(V) where V is the number of vertices.
// Space Complexity: O(V)