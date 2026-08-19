<?php
class Helikopter {
    public $balingBaling = 2;

    public function info(){
        echo "jumlah baling-baling helikopter ini " . $this->balingBaling;
    }
}

$helikopter = new Helikopter();
//var_dump($helikopter);
echo $helikopter->balingBaling;
echo $helikopter->info();