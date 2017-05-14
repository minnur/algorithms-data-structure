<?php

/**
 * Binary search tree.
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

  public function insert($node) {
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

  public function search($node) {
    if ($this->isNodeValid($node)) {
      return $this->searchNode($node, $this->root);
    }
  }

  public function dumpTree() {
    var_dump($this->root);
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

  protected function searchNode(Node $node, Node $subtree) {
    if ($node->value == $subtree->value) {
      // We found it.
      return true;
    }
    else if ($node->value > $subtree->value && isset($subtree->right)) {
      return $this->searchNode($node, $subtree->right);
    }
    else if ($node->value < $subtree->value && isset($subtree->left)) {
      return $this->searchNode($node, $subtree->left);
    }
    // Not found.
    return false;
  }

  protected function isNodeValid($node) {
    if (!is_a($node, 'Node')) {
      throw new ErrorException('Invalid data type. Please make sure you are passing objects type of Node.', E_WARNING);
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

if ($tree->search($e)) {
  echo "Yay!";
}
else {
  echo "Not Found"; 
}

$tree->dumpTree();

