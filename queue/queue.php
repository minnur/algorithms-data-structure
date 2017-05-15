<?php

/**
 * Queue.
 * 
 * Performance:
 *   The time complexity for insertion is O(1) while deletion is O(n) (in the worst case) 
 *   for a single operation. The amortized costs for both are O(1) since having to 
 *   delete n elements from the queue still takes O(n) time.
 */

class Item {

  public $data = null;
  public $next = null;
  public $prev = null;

  public function __construct(int $data) {
    $this->data = $data;
    return $this;
  }

}

class Queue {

  protected $head = null;
  protected $tail = null;

  public function insert($data) {
    $item = new Item($data);
    if (is_null($this->head)) {
      $this->head = $item;
    }
    else if (is_null($this->tail)) {
      $this->tail = $item;
      $this->head->next = $this->tail;
      $this->tail->prev = $this->head;
    }
    else {
      $this->tail->next = $item;
      $item->prev = $this->tail;
      $this->tail = $item;
    }
  }

  public function delete() {
    if (isset($this->head->data)) {
      $tmp = $this->tail;
      $data = $tmp->data;
      $this->tail = $this->tail->prev;
      if (isset($this->tail->next)) {
        $this->tail->next = null;
      }
      else {
        $this->tail = $this->head = null;
      }
      return $data;
    }
    return false;
  }

  public function __toString() {
    $output = '';
    $t = $this->head;
    while ($t) {
      $output .= $t->data . '  ';
      $t = $t->next;
    }
    return $output;
  }

}

$queue = new Queue();

$queue->insert(1);
$queue->insert(2);
$queue->insert(3);

$queue->delete();

echo $queue;

