<?php

define('MAX_SEED', 9*9*9*9);

$input = $argv[1];

$op = str_split(substr($input, 0, 3));
$target = substr($input, 3);

$eval = 'return ($a '.$op[0].' $b '.$op[1].' $c '.$op[2].' $d) == '.$target.';';

for ($seed = 0; $seed < MAX_SEED; $seed++) {
  $a = ($seed % 9)+1;
  $b = (floor($seed / 9) % 9)+1;
  $c = (floor($seed / (9*9)) % 9)+1;
  $d = (floor($seed / (9*9*9)) % 9)+1;
  
  if ($a == $b || $a == $c || $a == $d || $b == $c || $b == $d || $c == $d) {
    continue;
  }

  if (eval($eval)) {
    exit($a.$b.$c.$d);
  }
}
