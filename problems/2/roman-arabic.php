<?php

/**
 * Convert Roman to Europian numbers
 *
 */

class ConvertNumber {

  protected static $lookup = [
    'M'  => 1000,
    'D'  => 500,
    'CM' => 900,
    'CD' => 400,
    'C'  => 100,
    'XC' => 90,
    'L'  => 50,
    'XL' => 40,
    'X'  => 10,
    'IX' => 9,
    'V'  => 5,
    'IV' => 4,
    'I'  => 1,
  ];

  public static function roman(int $number) {
    if ($number <= 0 ) {
      throw new InvalidArgumentException("The number should be greater than 0.");
    }
    $result = '';
    while ($number) {
      foreach (self::$lookup as $roman => $arab) {
        if ($number >= $arab) {
          $number -= $arab;
          $result .= $roman;
          break;
        }
      }
    }
    return $result;
  }

  public static function numbers(string $input) {
    $result = 0;
    foreach (self::$lookup as $roman => $arab) {
      while (strpos($input, $roman) === 0) {
        $result += $arab;
        $input = substr($input, strlen($roman));
      }
    }
    return $result;
  }

}

$roman = ConvertNumber::roman(2017);

echo $roman;
echo '<br/>';
echo ConvertNumber::numbers($roman);

