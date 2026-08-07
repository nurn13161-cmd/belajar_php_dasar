<?php
$orang = [
    ["Nama" => "Alice", "Umur" => 25],
    ["Nama" => "Bob", "Umur" => 30],
    ["Nama" => "Charlie", "Umur" => 35]
];

foreach ($orang as $individu) {
    echo $individu["Nama"] . " berumur " . $individu["Umur"] . " tahun.<br>";
}
?>