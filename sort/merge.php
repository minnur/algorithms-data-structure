<?php

/**
 * Merge sort.
 * Merge sort is a divide and conquer algorithm that was invented by John von Neumann in 1945.
 *
 * Algorithm:
 *   1. Divide the unsorted list into n sublists, each containing 1 element (a list of 1 element is considered sorted).
 *   2. Repeatedly merge sublists to produce new sublists until there is only 1 sublist remaining. This will be the sorted list.
 * 
 * Performance:
 *   Worst case: O(n log n)
 *   Average case: O(n log n)
 *   Best case: O(n log n)
 * 
 * Steps:
 *   1 − if it is only one element in the list it is already sorted, return.
 *   2 − divide the list recursively into two halves until it can no more be divided.
 *   3 − merge the smaller lists into new list in sorted order.
 */

class MergeSort {

  /**
   * Sorting logic. This is where we find middle value
   * and split array into two halves recursively.
   */
  public function sort(array $array) {
    $count = count($array);
    if ($count <= 1) {
      return $array;
    }
    // Pivot
    $mid = floor($count / 2);
    // Left half
    $left  = array_slice($array, 0, $mid);
    // Right half
    $right = array_slice($array, $mid);

    return $this->merge($this->sort($left), $this->sort($right));
  }

  /**
   * Compare first element from left with first element from right.
   * Add the lowest to $sorted and erase it from parent array.
   */
  private function merge(array $left, array $right) {
    $sorted = [];
    while (count($left) > 0 && count($right) > 0) {
      if ($left[0] < $right[0]) {
        // Shift an element off the beginning of array.
        // This function will reset() the array pointer of the input array after use.
        array_push($sorted, array_shift($left));
      }
      else {
        array_push($sorted, array_shift($right));
      }
    }
    // Loop through $left/$right and add $left/$right[$i] into $sorted
    array_splice($sorted, count($sorted), 0, $left);
    array_splice($sorted, count($sorted), 0, $right);
    return $sorted;
  }

}

$merge = new MergeSort();
$sorted = $merge->sort([1, 3, 4, 7, 9, 2, 6, 5, 8]);
var_dump($sorted);
