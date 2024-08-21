<?php

class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function mergeTwoLists($list1, $list2) {
    $dummy = new ListNode();
    $current = $dummy;

    while ($list1 !== null && $list2 !== null) {
        if ($list1->val <= $list2->val) {
            $current->next = $list1;
            $list1 = $list1->next;
        } else {
            $current->next = $list2;
            $list2 = $list2->next;
        }
        $current = $current->next;
    }

    if ($list1 !== null) {
        $current->next = $list1;
    } else {
        $current->next = $list2;
    }

    return $dummy->next;
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

function printLinkedList($head) {
    $current = $head;
    $output = [];
    while ($current !== null) {
        $output[] = $current->val;
        $current = $current->next;
    }
    return $output;
}

$list1 = createLinkedList([1, 2, 4]);
$list2 = createLinkedList([1, 3, 4]);

$mergedList = mergeTwoLists($list1, $list2);

$result = printLinkedList($mergedList);

print_r($result);
