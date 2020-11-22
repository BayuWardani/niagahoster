<?php

require_once './vendor/autoload.php';
require "./vendor/larapack/dd/src/helper.php";

# twig setting
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader);


#get pricing data
$pricing_json = file_get_contents("./pricing.json");
// dd($pricing_json);
$pricing = json_decode($pricing_json,true); // encode json pricing data
// dd($pricing);
$contex = [
	"pricing" => $pricing
];
// dd($pricing);

echo $twig->render('index.html', $contex);