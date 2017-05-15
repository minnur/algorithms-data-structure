<?php

/**
 * Stack.
 * 
 * Performance:
 *   O(n)
 */

ini_set('xdebug.var_display_max_depth', 25);

class Item {

  protected $data = null;
  protected $next = null;

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

}

class Stack {

  protected $top = null;

  public function push(Item $item) {
    if (is_null($this->top)) {
      $this->top = $item;
    }
    else {
      $item->setNext($this->top);
      $this->top = $item;
    }
  }

  public function pop() {
    if ($this->top) {
      $t = $this->top;
      $data = $t->getData();
      $this->top = $this->top->getNext();
      $t = null;
      return $data;
    }
  }

  public function __toString() {
    $output = '';
    $t = $this->top;
    while ($t) {
      $output .= $t->getData() . ' ';
      $t = $t->getNext();
    }
    return $output;
  }

}

$a = new Item();
$a->setData(1);
$b = new Item();
$b->setData(4);
$c = new Item();
$c->setData(2);
$d = new Item();
$d->setData(5);
$e = new Item();
$e->setData(7);
$f = new Item();
$f->setData(9);

$stack = new Stack();

$stack->push($a);
$stack->push($b);
$stack->push($c);
$stack->push($d);
$stack->push($e);
$stack->push($f);

//echo $stack;

$stack->pop();
$stack->pop();

echo $stack;

