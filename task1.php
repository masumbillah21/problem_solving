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

function treeHeight($root) {
    if ($root === null) {
        return 0;
    }
    $leftHeight = treeHeight($root->left);
    $rightHeight = treeHeight($root->right);

    return max($leftHeight, $rightHeight) + 1;
}


$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
echo treeHeight($root) . "\n";

$root1 = new TreeNode(1);
$root1->right = new TreeNode(2);

echo treeHeight($root1);


// Time Complexity : O(n)
// Space Complexity : O(h) (h = height of the tree)