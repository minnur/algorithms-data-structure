<?php

/**
 * Binary search tree (balancing).
 *   The binary search tree is a specific kind of binary tree, where the each item
 *   keeps greater elements on the right, while the smaller items are on the left.
 * 
 * Performance:
 *   Could be O(n) and O(log n) (best when balanced)
 */

ini_set('xdebug.var_display_max_depth', 25);

class Node {

  public $value;  // Contains the node item
  public $left;   // The left child Node
  public $right;  // The right child Node

  public function __construct(int $item) {
    $this->value = $item;
    // New nodes are leaf nodes
    $this->left = null;
    $this->right = null;
  }

  // perform an in-order traversal of the current node
  public function dump() {
    if ($this->left !== null) {
      $this->left->dump();
    }
    if ($this->right !== null) {
      $this->right->dump();
    }
    var_dump($this->value);
  }

}

class BinaryTree {

  protected $root; // The root node of our tree
  protected $balanced; // Balanced tree

  public function __construct() {
    $this->root = null;
  }

  public function isEmpty() {
    return $this->root === null;
  }

  public function traverse() {
    // Dump the tree rooted at "root"
    $this->root->dump();
  }

//  public function 

  public function balanceNode($node) {
    if ($this->isNodeValid($node)) {
      if ($this->isEmpty()) {
        // Special case if tree is empty
        $this->root = $node;
      }
      else {
        // Insert the node somewhere in the tree starting at the root
        $this->insertNode($node, $this->root);
      }
    }
  }

  public function dumpTree() {
    var_dump($this->root);
  }

  public function dumpBalancedTree() {
    var_dump($this->balanced);
  }

  public function balance() {
    $this->balanceTree($this->root);
  }

  protected function insertNode(Node $node, &$subtree) {
    if ($subtree === null) {
      // Insert node here if subtree is empty
      $subtree = $node;
    }
    else {
      if ($node->value > $subtree->value) {
        // Keep trying to insert right
        $this->insertNode($node, $subtree->right);
      }
      else if ($node->value < $subtree->value) {
        // Keep trying to insert left
        $this->insertNode($node, $subtree->left);
      }
    }
  }

  protected function balanceTree($tree) {
    foreach ($this->root as $node) {
      $this->balanceNode($node, $balanced->root);
    }
  }

  protected function isNodeValid($node) {
    if (!is_a($node, 'Node')) {
      throw new InvalidArgumentException('Invalid data type. Please make sure you are passing objects type of Node.');
    }
    return true;
  }

}

$a = new Node(3);
$b = new Node(2);
$c = new Node(4);
$d = new Node(7);
$e = new Node(6);
$f = new Node(33);

$tree = new BinaryTree();

$tree->insert($a);
$tree->insert($b);
$tree->insert($c);
$tree->insert($d);
$tree->insert($e);
$tree->insert($f);

$tree->dumpTree();

