<?php
function removeDuplicates($s) {
    $stack = [];

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        
        if (!empty($stack) && end($stack) === $char) {
            array_pop($stack);
        } else {
            $stack[] = $char;
        }
    }
    
    return implode('', $stack);
}


echo removeDuplicates("abbaca") . "\n";
echo removeDuplicates("azxxzy") . "\n";
