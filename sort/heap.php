<?php

/**
 * Heap sort.
 * Heapsort is a comparison-based sorting algorithm to create a sorted array (or list),
 * and is part of the selection sort family.
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
    $this->heapify($array, $count);
    $end = $count - 1;
    while ($end > 0) {
      $tmp = $array[0];
      $array[0] = $array[$end];
      $array[$end] = $tmp;
      $end = $end - 1;
      $this->siftDown($array, 0, $end);
      print_r('<pre>');
      print_r($array);
    }
    return $array;
  }

  private function heapify(&$array, int $count) {
    $start = floor(($count - 2) / 2);
    print_r($start);exit;
    while ($start >= 0) {
     $this->siftDown($array, $start, $count - 1);
      $start = $start - 1;
    }
  }

  private function siftDown(array &$array, $k, $n) {
    $e = $array[$k];
    // loop until we won't have descendants
    while ($k <= $n / 2) {
      $j = $k * 2;
      if ($j < $n && $array[$j] < $array[$j + 1]) {
        $j++;
      }
      if ($e >= $array[$j]) {
        break;
      }
      $array[$k] = $array[$j];
      $k = $j;
    }
    $array[$k] = $e;
  }

}

$heap = new HeapSort();
$sorted = $heap->sort([1, 999, 10, 3, 4, 7, 9, 2, 6, 5, 8, 22, 10, 20]);
var_dump($sorted);
