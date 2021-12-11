<?php
include 'planet.php';

use Planet\Planet;

$planetBinary = new Planet(2, 2, 0);
echo $planetBinary->getDate()."\n";
echo $planetBinary->getUTCDate()."\n";
echo "\n";

$planetEarth = new Planet(31, 12, 751440 + 341 + 9); // today
echo $planetEarth->getDate()."\n";
echo "\n";

echo "Earth to Binary: ".$planetEarth->convertUsToThem($planetBinary)."\n";
echo "\n";

$planetEarth->addDate('1-2-30');
echo $planetEarth->getDate()."\n";
echo "\n";