<?php

/**
 * Heap sort.
 *   Heapsort is a comparison-based sorting algorithm to create a sorted array (or list),
 *   and is part of the selection sort family.
 *
 * Algorithm:
 *   1. Build a heap (heap is a tree structure with rule that parent value are bigger or equal with childrens values) out of the data.
 *   2. Removing the largest element from the heap and insert in sorted array starting with first position (0).
 *   3. Reconstruct the heap with remaining elements and add largest value in sorted array.
 * 
 * Performance:
 *   Worst case: O(n log n)
 *   Average case: O(n log n)
 *   Best case: O(n log n)
 */

class HeapSort {

  /**
   * Sorting logic.
   * Change first value to the end of array recursively.
   */
  public function sort(array $array) {
    $count = count($array);
    if ($count <= 1) {
      return $array;
    }
    // Building bottom rows of the pyramid.
    for ($i = floor($count / 2) - 1; $i >= 0; $i--) {
      $this->siftDown($array, $i, $count);
    }
    // Scanning through other elements.
    for ($i = $count - 1; $i >= 1; $i--) {
      $tmp = $array[0];
      $array[0] = $array[$i];
      $array[$i] = $tmp;
      $this->siftDown($array, 0, $i - 1);
    }
    return $array;
  }

  /**
   * Forming a heap.
   */
  private function siftDown(array &$array, int $root, int $count) {
    $maxChild = null;
    $done = false;
    while (($root * 2 <= $count) && !$done) {
      // Checking if we're in the last row
      if ($root * 2 == $count) {
        $maxChild = $root * 2;
      }
      else if ($array[$root * 2] > $array[$root * 2 + 1]) {
        $maxChild = $root * 2;
      }
      else {
        $maxChild = $root * 2 + 1;
      }
      // If top element is smaller than child element.
      if ($array[$root] < $array[$maxChild]) {
        $tmp = $array[$root];
        $array[$root] = $array[$maxChild];
        $array[$maxChild] = $tmp;
        $root = $maxChild;
      }
      else {
        $done = true;
      }
    }
  }

}

$heap = new HeapSort();
$sorted = $heap->sort([1, 999, 10, 3, 4, 7, 9, 2, 6, 5, 8, 22, 10, 20]);
var_dump($sorted);
