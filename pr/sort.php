<?php

class Sort {

  public function quicksort(array $array) {

    $count = count($array);
    if ($count <= 1) {
      return $array;
    }

    $pivot = $array[floor($count / 2)];
    $left = $right = [];

    for ($i = 0; $i < $count; $i++) {
      if ($array[$i] == $pivot) {
        continue;
      }
      if ($array[$i] < $pivot) {
        $left[] = $array[$i];
      }
      else {
        $right[] = $array[$i];
      }
    }

    $left = $this->quicksort($left);
    $right = $this->quicksort($right);

    return array_merge($left, [$pivot], $right);

  }

  public function mergesort(array $array) {

    $count = count($array);
    if ($count <= 1) {
      return $array;
    }

    $mid = floor($count / 2);

    $left = array_slice($array, 0, $mid);
    $right = array_slice($array, $mid);

    return $this->merge($this->mergesort($left), $this->mergesort($right));

  }

  protected function merge(array $left, array $right) {
    $sorted = [];
    while (count($left) > 0 && count($right) > 0) {
      if ($left[0] < $right[0]) {
        array_push($sorted, array_shift($left));
      }
      else {
        array_push($sorted, array_shift($right));
      }
    }
    array_splice($sorted, count($sorted), 0, $left);
    array_splice($sorted, count($sorted), 0, $right);
    return $sorted;
  }

}

$array = [12, 10, 3, 4, 7, 9, 2, 6, 5, 8, 22, 10, 20, 1, 21];

$sort = new Sort();
$sorted =$sort->mergesort($array);

var_dump($sorted);
