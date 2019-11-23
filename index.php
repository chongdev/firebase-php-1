<?php


require_once './vendor/autoload.php';


use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/probookingapp-0ffc2876f0e8.json');

$firebase = (new Factory)

    ->withServiceAccount($serviceAccount)
    ->create();

$database = $firebase->getDatabase();


echo '<pre>';
print_r($database);
echo '</pre>';