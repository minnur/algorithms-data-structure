<?php

/**
 * Dynamic programming.
 *
 *   Knapsack problem (0/1 problem).
 *     We can either take an entire item or reject it completley.
 *     We cannot break an item and fill the knapsack.
 *
 *   Objective: fill the knapsack with items such that benefit (value or profit) is max.
 *   I used the following video: https://www.youtube.com/watch?v=dN_gQYo9Uf8&t=648s
 */

ini_set('xdebug.var_display_max_depth', 25);

class Item {

  public $label;
  public $value;
  public $weight;

  public function __construct($label, $value, $weight) {
    $this->label = $label;
    $this->value = $value;
    $this->weight = $weight;
  }

}

class Knapsack {

  protected $items;
  protected $capacity;
  protected $inside = [];

  public function __construct(array $items, int $capacity) {
  	$this->items = $items;
    $this->capacity = $capacity;
  }

  public function pick() {
    $items_count = count($this->items) - 1;
    for ($i = 0; $i <= $items_count; $i++) {
      for ($w = 0; $w <= $this->capacity; $w++) {
        if ($i == 0 || $w == 0) {
          $this->inside[$i][$w] = 0;
        }
        else if ($this->items[$i]->weight <= $w) {
          $this->inside[$i][$w] = max(
            $this->inside[$i - 1][$w],
            $this->items[$i]->value + $this->inside[$i - 1][$w - $this->items[$i]->weight]
          );
        }
        else {
          $this->inside[$i][$w] = $this->inside[$i - 1][$w];
        }
      } 
    }
    // The last item will be the max.
    // O(nm) time complexity
    return $this->inside[$items_count][$this->capacity];
  }

}

$items = [];
$items[] = new Item('Product 1', 100, 3);
$items[] = new Item('Product 2', 20, 2);
$items[] = new Item('Product 3', 60, 4);
$items[] = new Item('Product 4', 40, 1);
$items[] = new Item('Product 5', 80, 5);

$capacity = 5;

$ks = new Knapsack($items, $capacity);
echo $ks->pick();
