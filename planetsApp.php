<?php
include 'planet.php';

use Planet\Planet;

$planetBinary = new Planet(2, 2, 0);
echo $planetBinary->get_date();
echo "\n";
echo $planetBinary->get_UTC_date();
echo "\n";

$planetEarth = new Planet(31, 12, 751440 + 341 + 9); // today
echo $planetEarth->get_date();
echo "\n";
echo $planetEarth->get_UTC_date();
echo "\n";

echo $planetEarth->convert_us_to_them($planetBinary);