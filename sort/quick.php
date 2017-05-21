<?php

/**
 * Quick sort.
 *   Quicksort is a divide and conquer algorithm: recursively split a large array in two sub-arrays, 
 *   one with low elements and second with high elements.
 *
 * Algorithm:
 *   1. Pick an element, called pivot, from the list.
 *   2. Reorder the list so the element with value less than pivot came before pivot, and elements higher came after the pivot.
 *   3. Recursively sort the sub-list of lower and higher elements.
 * 
 * Performance:
 *   Worst case: O(n^2)
 *   Average case: O(n log n)
 *   Best case: O(n log n)
 */

class QuickSort {

  /**
   * Sorting logic.
   */
  public function sort(array $array) {
    $count = count($array);
    if ($count <= 1) {
      return $array;
    }
    $pivot = $array[floor($count / 2)];
    // Left half
    $left = $right = [];

    for ($i = 0; $i < $count; $i++) {
      if ($array[$i] == $pivot) {
        continue;
      }
      if ($array[$i] <= $pivot) {
        $left[] = $array[$i];
      }
      else {
        $right[] = $array[$i];
      }
    }

    $left = $this->sort($left);
    $right = $this->sort($right);

    return array_merge($left, [$pivot], $right);
  }

}

$quick = new QuickSort();
$sorted = $quick->sort([12, 10, 3, 4, 7, 9, 2, 6, 5, 8, 22, 10, 20, 1, 21]);
var_dump($sorted);
