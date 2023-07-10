<?php

/**
 * Get 5 pages of services
 */

require __DIR__ . '/../vendor/autoload.php';

use tosdr\api\Service;

$Services = Service::list(1);

function outputPage($Services){

    if($Services->getPage() >= 5){
        exit;
    }

    echo sprintf("Page: %s", $Services->getPage()) . PHP_EOL;

    
    foreach($Services->getServices() as $Service){
        echo sprintf("Name: %s", $Service->getName()) . PHP_EOL;
    }

    $Services->nextPage();    
    return outputPage($Services);
}

outputPage($Services);