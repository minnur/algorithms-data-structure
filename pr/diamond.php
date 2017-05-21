<?php

/**
 * Given an ODD number, print diamond pattern of stars recursively.
 *
 *
 * n = 5, Diamond shape is as follows:
      *
     ***
    *****
     ***
      *
 *
 */

class Diamond {

  public function print(int $n) {
    if ($n <= 0 && $n % 2 != 0) {
      throw new InvalidArgumentException("Inavlid parameter");
    }
    for ($i = 1; $i < $n; $i += 2) {
      $this->printStars($i);
      echo "\n";
    }
    $this->printStars($n);
    for ($i = $n - 2; $i >= 1; $i -= 2) {
      echo "\n";
      $this->printStars($i);
    }
  }

  private function printStars(int $n) {
    while ($n > 0) {
      echo "*";
      $n--;
    }
  }

}

$diamond = new Diamond();
$diamond->print(7);
