<?php

require_once("Helpers/TextFormatHelper.php");
require_once("Helpers/LocationAddHelper.php");

$location = [];

$location = LocationAddHelper::addLocation($location, "Espanha", "Madrid");
$location = LocationAddHelper::addLocation($location, "Brasil", "Brasilia");
$location = LocationAddHelper::addLocation($location, "EUA", "Washington");
$location = LocationAddHelper::addLocation($location, "Argentina", "Buenos Aires");
$location = LocationAddHelper::addLocation($location, "Bahamas", "Nassau");

foreach ($location as $countryName => $capital) {
	echo TextFormatHelper::formatTextToShow($countryName, $capital);
}