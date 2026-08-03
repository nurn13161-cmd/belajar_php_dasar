<?php

$a = 50;
$b = 30;

// Operator Perbandingan
echo var_export($a == $b, true) . "<br>";   // Sama dengan (==) -> false
echo var_export($a === $b, true) . "<br>";  // Identik (===) -> false
echo var_export($a != $b, true) . "<br>";   // Tidak sama dengan (!=) -> true
echo var_export($a !== $b, true) . "<br>";  // Tidak identik (!==) -> true
echo var_export($a > $b, true) . "<br>";    // Lebih besar dari (>) -> true
echo var_export($a < $b, true) . "<br>";    // Lebih kecil dari (<) -> false
echo var_export($a >= $b, true) . "<br>";   // Lebih besar atau sama dengan (>=) -> true
echo var_export($a <= $b, true) . "<br>";   // Lebih kecil atau sama dengan (<=) -> false

?>