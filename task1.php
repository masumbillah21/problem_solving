<?php
function validPath($n, $edges, $source, $destination) {

    $graph = array_fill(0, $n, []);
    
    foreach ($edges as $edge) {
        [$u, $v] = $edge;
        $graph[$u][] = $v;
        $graph[$v][] = $u;
    }

    if ($source === $destination) {
        return true;
    }

    $queue = [$source];
    $visited = array_fill(0, $n, false);
    $visited[$source] = true;

    while (!empty($queue)) {
        $current = array_shift($queue);
        
        foreach ($graph[$current] as $neighbor) {
            if (!$visited[$neighbor]) {

                if ($neighbor === $destination) {
                    return true;
                }
                $visited[$neighbor] = true;
                $queue[] = $neighbor;
            }
        }
    }

    return false;
}

$n = 3;
$edges = [[0, 1], [1, 2], [2, 0]];
$source = 0;
$destination = 2;

$result = validPath($n, $edges, $source, $destination);
echo $result ? 'true' : 'false';

echo "\n";

$n = 6;
$edges = [[0,1],[0,2],[3,5],[5,4],[4,3]];
$source = 0;
$destination = 5;

$result = validPath($n, $edges, $source, $destination);
echo $result ? 'true' : 'false';
