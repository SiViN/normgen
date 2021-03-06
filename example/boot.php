<?php

use Minetro\Normgen\Analyser\Database\DatabaseAnalyser;
use Minetro\Normgen\SimpleFactory;
use Tracy\Debugger;
use Minetro\Normgen\Config\Impl\SeparateConfig;
use Minetro\Normgen\Config\Impl\TogetherConfig;

require_once __DIR__ . '/../vendor/autoload.php';

Debugger::enable(Debugger::DEVELOPMENT, __DIR__);

$factory = new SimpleFactory(
    new SeparateConfig(['output' => __DIR__ . '/model/separate-' . time()]),
    new DatabaseAnalyser('mysql:host=localhost;dbname=burza', 'root')
);

$factory->create()->generate();

$factory = new SimpleFactory(
    new TogetherConfig(['output' => __DIR__ . '/model/together-' . time()]),
    new DatabaseAnalyser('mysql:host=localhost;dbname=burza', 'root')
);

$factory->create()->generate();