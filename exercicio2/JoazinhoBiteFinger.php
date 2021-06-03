<?php

$texto = "Joãozinho mordeu o seu dedo !";

if (false === foiMordido()) {
	$texto = "Joãozinho NAO mordeu o seu dedo !";
}

echo $texto;

function foiMordido()
{
	$numero = rand(1, 100);
	$eNumeroPar = ($numero % 2) == 0;

	if(true === $eNumeroPar) {
		return true;
	}

	return false;
}