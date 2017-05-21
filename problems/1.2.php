<?php

/**
 * Check permutations.
 */

class Permutation {

  protected $permutations = [];

  public function isPermutation(string $str, array $permutations) : bool {
    return in_array($str, $permutations);
  }

  public function getPermutations(string $str) : array {
    /* If we only have a single character, return it */
    if (strlen($str) < 2) {
      $this->permutations[] = $str;
      return $this->permutations;
    }
    /* Copy the string except for the first character */
    $tail = substr($str, 1);
    /* Loop through the permutations of the substring created above */
    foreach ($this->getPermutations($tail) as $permutation) {
      /* Get the length of the current permutation */
      $length = strlen($permutation);
      /* Loop through the permutation and insert the first character of the original string between the two parts and store it in the result array */
      for ($i = 0; $i <= $length; $i++) {
        $this->permutations[] = substr($permutation, 0, $i) . $str[0] . substr($permutation, $i);
      }
    }
    return $this->permutations;
  }

}

$string1 = 'AABCD';
$string2 = 'DCBAA';

$obj = new Permutation();
$permutations = $obj->getPermutations($string1);
if ($obj->isPermutation($string2, $permutations)) {
  echo 'String 2 is a permutation of String 1';
}
else {
  echo 'String 2 is NOT a permutation of String 1';
}
