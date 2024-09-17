<?php

class TreeNode {
    public $val;
    public $left;
    public $right;

    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function searchBST($root, $val) {
    if ($root === null) {
        return null;
    }

    if ($root->val === $val) {
        return $root;
    }

    if ($val < $root->val) {
        return searchBST($root->left, $val);
    } else {
        return searchBST($root->right, $val);
    }
}

function treeToArray($root) {
    if ($root === null) {
        return [];
    }

    $result = [];
    $queue = [$root];

    while (!empty($queue)) {
        $node = array_shift($queue);
        if ($node !== null) {
            $result[] = $node->val;
            $queue[] = $node->left;
            $queue[] = $node->right;
        }
    }

    return $result;
}

// Example usage
$root = new TreeNode(4);
$root->left = new TreeNode(2);
$root->right = new TreeNode(7);
$root->left->left = new TreeNode(1);
$root->left->right = new TreeNode(3);

$val = 2;
$subtree = searchBST($root, $val);
$output = treeToArray($subtree);

print_r($output);

$val = 5;
$subtree = searchBST($root, $val);
$output = treeToArray($subtree);

print_r($output);

// Time complexity: O(h) (h = height of the tree)
// Space complexity: O(h)