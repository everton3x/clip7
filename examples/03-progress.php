#!/usr/bin/php
<?php
require __DIR__ . '/../vendor/autoload.php';

$bar = new \CLIP\TUI\Progress();

for($i = 0; $i <= 100; $i++){
    sleep(1);
    $bar->update($i);
}
