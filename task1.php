<?php

class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function reverseLinkedList($head) {
    $prev = null;
    $current = $head;
    
    while ($current !== null) {
        $nextNode = $current->next; 
        $current->next = $prev; 
        $prev = $current;
        $current = $nextNode;
    }
    
    return $prev;
}


function printLinkedList($head) {
    $current = $head;
    $output = [];
    while ($current !== null) {
        $output[] = $current->val;
        $current = $current->next;
    }
    return $output;
}

function createLinkedList($values) {
    if (empty($values)) {
        return null;
    }
    $head = new ListNode($values[0]);
    $current = $head;
    for ($i = 1; $i < count($values); $i++) {
        $current->next = new ListNode($values[$i]);
        $current = $current->next;
    }
    return $head;
}

$values_1 = [1, 2, 3, 4, 5];
$head_1 = createLinkedList($values_1);
$reversedHead_1 = reverseLinkedList($head_1);
$output_1 = printLinkedList($reversedHead_1);
print_r($output_1);

$values_2 = [1, 2];
$head_2 = createLinkedList($values_2);
$reversedHead_2 = reverseLinkedList($head_2);
$output_2 = printLinkedList($reversedHead_2);
print_r($output_2);