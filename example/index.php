<?php

ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';
require 'Usuario.php';
require 'Endereco.php';

$filter = new FilterCreator\Filter();
$filter->setButtonName('Filtrar');
$filter->attach('/usuarios/filtrar');
$select = new Usuario();
$input = new Endereco();
$filter->add($select);
$filter->add($input);
echo $filter->mount();