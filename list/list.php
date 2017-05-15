<?php

/**
 * Lined List.
 *   This kind of data structures are called singly linked lists. 
 *   In this case the the last element doesn’t have a successor, so the pointer
 *   to its next element usualy is NULL. However the most implemented version of a 
 *   linked list supports two pointers. These are the so called doubly linked lists.
 * 
 * Performance:
 *   O(n)
 */

ini_set('xdebug.var_display_max_depth', 25);

class Person {

  public $next = null;
  public $prev = null;

  protected $name;
  protected $index;

  public function __construct(string $name, int $index) {
    $this->name = $name;
    $this->index = $index;
  }

  public function getIndex() {
    return $this->index;
  }

  public function __toString() {
    return $this->name . '(' . $this->index . ')';
  }

}

class LList {

  public $head;
  public $tail;

  public function length() {
    $length = 0;
    $current = $this->head;
    while ($current) {
      $length++;
      $current = $current->next;
    }
    return $length;
  }

  // Front
  public function insert(Person $item) {
    $item->next = $this->head;
    if (!is_null($this->head)) {
      $this->head->prev = $item;
    }
    $this->head = $item;
  }

  public function insertAfter(Person $new, Person $item) {

    $current = $this->head;
    while ($current) {
      if ($current == $item) {

        $next = $current->next;
        $current->next = $new;
        $new->prev = $current;

        if (!is_null($next)) {
          $new->next = $next;
          $next->prev = $new;
        }

      }
      $current = $current->next;
    }


  }

  public function insertBefore(Person $new, Person $item) {

    $current = $this->head;
    while ($current) {
      if ($current == $item) {
        // Set pointer to a new item in the previous object.
        if (!is_null($current->prev)) {
          $current->prev->next = $new;
          $prev = $current->prev;
          $current->prev = $new;
          $new->next = $current;
          $new->prev = $prev;
        }
        else {
          // If we're adding element before the very first.
          $new->next = $current;
          $this->head = $new;
        }

      }
      $current = $current->next;
    }

  }

  public function reverse() {

    $current = $this->head;
    $prev = null;

    while ($current) {

      $next = $current->next;
      $current->next = $prev;
      $prev = $current;
      $current = $next;

    }
    $this->head = $prev;

  }

  public function delete(Person $item) {

    $current = $this->head;
    while ($current) {

      if ($current == $item) {

        $prev = $current->prev;
        $next = $current->next;

        if (!is_null($prev)) {
          $prev->next = $next;
        }
        else {
          // because head points to the first item
          $this->head = $next;
        }

        return $current;
      }

      $current = $current->next;

    }

  }

  public function sort() {

    $current = $this->head;
    while ($current) {
      // Simple sort (bubble)
      // Best O(n) Worst O(n^2)

      if (!is_null($current->next)) {
        $next = $current->next;
        if ($current->getIndex() > $next->getIndex()) {
          $tmp = $current;
          $current = $next;
          $next = $tmp;
        }
      }
      $current = $current->next;
    }

  }

  public function __toString() {
    $current = $this->head;
    $output = '';
    while ($current) {
      $output .= $current . ' ';
      $current = $current->next;
    }
    return $output . "\n";
  }

}

$ll = new LList();

$a = new Person('Person A', 1);
$b = new Person('Person B', 2);
$c = new Person('Person C', 3);
$d = new Person('Person D', 7);
$e = new Person('Person E', 10);
$f = new Person('Person F', 5);
$g = new Person('Person G', 9);

$ll->insert($a);
$ll->insert($b);
$ll->insert($c);
$ll->insert($d);
$ll->insert($e);
$ll->insert($f);
$ll->insert($g);

//$ll->delete($c);

$ll->sort();

//$ll->insertAfter($f, $a);
//$ll->insertBefore($g, $e);

$ll->reverse();

echo $ll;
