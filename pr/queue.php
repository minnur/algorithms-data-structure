<?php

ini_set('xdebug.var_display_max_depth', 25);

class Item {

  public $next;
  public $prev;
  public $value;

  public function __construct($value) {
    $this->value = $value;
  }

}

class Queue {

  protected $head = null;
  protected $tail = null;
  protected $capacity;
  protected $count = 0;

  public function setCapacity(int $capacity) {
    $this->capacity = $capacity;
    return $this;
  }

  public function enqueue(Item $item) {
    if ($this->count >= $this->capacity) {
      echo "Queue is full \n";
    }
    if (is_null($this->head)) {
      $this->head = $item;
    }
    else if (is_null($this->tail)) {
      $this->tail = $item;
      $this->head->next = $item;
      $this->tail->prev = $this->head;
    }
    else {
      $this->tail->next = $item;
      $this->tail = $item;
    }
    $this->count++;
    return $this;
  }

  public function dequeue() {
    $this->count--;
    if (!is_null($this->head)) {
      $this->head = $this->head->next;
      if (!empty($this->head->prev)) {
        $this->head->prev = null;
      }
    }
    else {
      $this->head = $this->tail = null;
    }
    if ($this->count <= 0) {
      $this->count = 0;
      echo "Queue is empty \n";
    }
    return $this;
  }

  public function __toString() {
    //var_dump($this);
    $output = '';
    $current = $this->head;
    while ($current) {
      $output .= 'Item: ' . $current->value . " \n";
      $current = $current->next;
    }
    return $output;
  }

}

$queue = new Queue();
$queue->setCapacity(3);

$queue
  ->enqueue(new Item(1))
  ->enqueue(new Item(2))
  ->enqueue(new Item(3));

$queue
  ->dequeue()
  ->dequeue()
  ->dequeue();

echo $queue;
