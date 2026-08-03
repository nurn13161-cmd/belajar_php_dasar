<?php

$a = false;
$b = false;

// Operator Logika
echo var_dump($a && $b) . "<br>"; // AND (&&) -> bool(false)
echo var_dump($a || $b) . "<br>"; // OR (||) -> bool(false)
echo var_dump(!$a) . "<br>";      // NOT (!) -> bool(true)
echo var_dump($a xor $b) . "<br>";// XOR (xor) -> bool(false)

?>