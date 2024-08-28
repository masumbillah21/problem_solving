<?php

function isValid($s) {
    $bracketMap = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];
    
    $stack = [];
    
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        
        if (array_key_exists($char, $bracketMap)) {
            if (empty($stack) || array_pop($stack) !== $bracketMap[$char]) {
                return false;
            }
        } else {
            $stack[] = $char;
        }
    }
    
    return empty($stack);
}


var_dump(isValid("()")); 
var_dump(isValid("()[]{}"));
var_dump(isValid("(]"));
var_dump(isValid("{()}"));
var_dump(isValid("{(})"));
