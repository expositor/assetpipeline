<?php

require ('../vendor/autoload.php');
use Wollnerstudios\AssetPipeline\AssetPipeline;
use Wollnerstudios\AssetPipeline\Assets;

$pipeline = new AssetPipeline();
$pipeline->setBaseURL('google.com/');
$pipeline->addAsset('bootstrap');

