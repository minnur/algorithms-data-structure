<?php

/**
 * Stack with multiple containers.
 */

class Item {

  protected $data;
  protected $next = null;
  protected $container;

  public function __construct($data) {
    $this->data = $data;
  }

  public function setData(int $data) {
    $this->data = $data;
    return $this;
  }

  public function getData() {
    return $this->data;
  }

  public function setNext(Item $next) {
    $this->next = $next;
    return $this;
  }

  public function getNext() {
    return $this->next;
  }

  public function setContainer(int $container) {
    $this->container = $container;
    return $this;
  }

  public function getContainer() {
    return $this->container;
  }

}

class Stack {

  protected $stack;
  protected $container_capacity;
  protected $container = 0;
  protected $container_items = [];

  public function __construct() {
    $this->initContainer();
  }

  public function setContainerCapacity(int $container_capacity) {
    $this->container_capacity = $container_capacity;
    return $this;
  }

  public function push(Item $item) {
    if ($this->container_items[$this->container] == $this->container_capacity) {
      $this->container++;
      // Initialize new container
      $this->initContainer();
    }
    if (is_null($this->stack[$this->container])) {
      $item->setContainer($this->container);
      $this->stack[$this->container] = $item;
    }
    else {
      $item->setNext($this->stack[$this->container]);
      $item->setContainer($this->container);
      $this->stack[$this->container] = $item;
    }
    $this->container_items[$this->container]++;
  }

  public function pop() {
    if ($this->container_items[$this->container] == 0 && $this->container > 0) {
      $this->container--;
    }
    if (!is_null($this->stack[$this->container])) {
      $this->stack[$this->container] = $this->stack[$this->container]->getNext();
      if ($this->container_items[$this->container] > 0) {
        $this->container_items[$this->container]--;
      }
    }
    if ($this->container == 0 && $this->container_items[$this->container] == 0) {
      echo "Stack is empty";
    }
  }

  public function __toString() {
    $output = '';
    for ($i = 0; $i <= $this->container; $i++) {
      $item = $this->stack[$i];
      while ($item) {
        $output .= '(Container: ' . (int) $item->getContainer() . '): Item: ' . $item->getData() . "\n";
        $item = $item->getNext();
      }
    }
    return $output;
  }

  protected function initContainer() {
    // Init
    $this->container_items[$this->container] = 0;
    $this->stack[$this->container] = null;
  }

}

$stack = new Stack();
$stack->setContainerCapacity(5);

$stack->push(new Item(1));
$stack->push(new Item(2));
$stack->push(new Item(3));
$stack->push(new Item(4));

$stack->pop();
$stack->pop();

echo $stack;

