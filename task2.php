<?php
function countConnectedComponents($A, $B) {
    $graph = [];
    for ($i = 0; $i < count($B); $i++) {
        $u = $B[$i][0];
        $v = $B[$i][1];
        if (!isset($graph[$u])) {
            $graph[$u] = [];
        }
        if (!isset($graph[$v])) {
            $graph[$v] = [];
        }
        $graph[$u][] = $v;
        $graph[$v][] = $u;
    }

    $visited = array_fill(1, $A, false);
    $connectedComponents = 0;

    function dfs($node, &$visited, $graph) {
        $stack = [$node];
        while (!empty($stack)) {
            $curr = array_pop($stack);
            if (isset($graph[$curr])) {
                foreach ($graph[$curr] as $neighbor) {
                    if (!$visited[$neighbor]) {
                        $visited[$neighbor] = true;
                        $stack[] = $neighbor;
                    }
                }
            }
        }
    }

    for ($i = 1; $i <= $A; $i++) {
        if (!$visited[$i]) { 
            $connectedComponents++;
            $visited[$i] = true;
            dfs($i, $visited, $graph);
        }
    }

    return $connectedComponents;
}

$A1 = 4;
$B1 = [[1, 2], [2, 3]];
echo countConnectedComponents($A1, $B1) . "\n";





// Time Complexity: O(A+∣B∣) where A is the number of nodes and ∣B∣ is the number of edges. This is because we visit each node and each edge once.
// Space Complexity: O(A+∣B∣) due to the adjacency list representation and the visited list. In the worst case, we could have all nodes and edges represented in our structures.