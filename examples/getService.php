<?php

require __DIR__ . '/../vendor/autoload.php';

use tosdr\api\Service;

$Service = Service::get(182); # Facebook


echo sprintf("Name: %s", $Service->getName()) . PHP_EOL;
echo sprintf("Reviewed: %s", $Service->isComprehensivelyReviewed() ? "Yes" : "No") . PHP_EOL;
echo sprintf("Shield Url: %s", $Service->getShieldUrl()) . PHP_EOL;
echo sprintf("Phoenix Url: %s", $Service->getPhoenixUrl()) . PHP_EOL;
echo sprintf("Crisp Url: %s", $Service->getCrispUrl()) . PHP_EOL;