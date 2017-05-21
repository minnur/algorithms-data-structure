<?php

/**
 * Determine if a string has all unique characters.
 */

/**
 * No data structure usage.
 */
function is_unique_no_ds(string $str) {
  // We assume that the string could also contain numbers. 
  $count = 0;
  $length = strlen($str);
  for ($i = 0; $i < $length; $i++) {
    for ($j = 0; $j < $length; $j++) {
      if ($str[$j] == $str[$i]) {
        $count++;
      }
    }
  }
  if ($count == $length) {
    return true;
  }
  return false;
}

$string = "abcd4215";

if (is_unique_no_ds($string)) {
  echo "All unique characters";
}
else {
  echo "Doesn't contain all unique characters";
}

echo '<hr>Hash:</br>';

/**
 * Hashtables.
 */
function is_unique_hash(string $str) {
  $hash = [];
  $unique = true;
  for ($i = 0; $i < strlen($str); $i++) {
    if (!isset($hash[$str[$i]])) {
      $hash[$str[$i]] = 0;
    }
    if ($hash[$str[$i]] >= 1) {
      $unique = false;
    }
    $hash[$str[$i]]++;
  }
  return $unique;
}

if (is_unique_hash($string)) {
  echo "All unique characters";
}
else {
  echo "Doesn't contain all unique characters";
}
