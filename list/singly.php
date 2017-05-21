<?php

/**
 * Lined Singly List.
 */

ini_set('xdebug.var_display_max_depth', 25);

class Item {

  protected $next = null;
  protected $value;

  public function __construct(int $value) {
    $this->value = $value;
  }

  public function setValue(int $value) {
    $this->value = $value;
    return $this;
  }

  public function getValue() {
    return $this->value;
  }

  public function setNext($item) {
    $this->next = $item;
    return $this;
  }

  public function getNext() {
    return $this->next;
  }

}

class SinglyList {

  protected $head = null;

  public function insert(Item $item) {
    if (is_null($this->head)) {
      $this->head = $item;
    }
    else {
      $item->setNext($this->head);
      $this->head = $item;
    }
    return $this;
  }

  public function search(Item $item) {
    $current = $this->head;
    while ($current) {
      if ($current->getValue() == $item->getValue()) {
        return true;
      }
      $current = $current->getNext();
    }
    return false;
  }

  public function delete(Item $item) {
    $current = $prev = $this->head;
    if ($current == NULL) {
      return;
    }
    while ($current->getValue() != $item->getValue() && $current->getNext() != NULL) {
      $prev = $current;
      $current = $current->getNext();
    }
    if ($current->getValue() == $item->getValue()) {
      $prev->setNext($current->getNext());
    }
  }

  public function __toString() {
    $current = $this->head;
    $output = '';
    while ($current) {
      $output .= $current->getValue() . ' ';
      $current = $current->getNext();
    }
    return $output . "\n";
  }

}

$singly = new SinglyList();

$singly
  ->insert(new Item(1))
  ->insert(new Item(2))
  ->insert(new Item(3))
  ->insert(new Item(4));

$singly->delete(new Item (4));

if ($singly->search(new Item(3))) {
  // echo "Found\n";
}

echo $singly;
