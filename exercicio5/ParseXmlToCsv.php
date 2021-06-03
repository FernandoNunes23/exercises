<?php

require_once("Helpers/XmlParserHelper.php");

$xmlFileName = 'test.xml';
$csvFilename = 'result.csv';

$xmlParserHelper = new XmlParserHelper($csvFilename, $xmlFileName);

if (file_exists($xmlFileName)) {
	try {
		$xmlParserHelper->generateCsvFileFromXml();

		echo "Csv gerado com sucesso.";
	} catch (\Exception $exception) {
		echo "Erro ao gerar xml: {$exception->getMessage()}";
	}
} else {
	echo "Arquivo xml não encontrado.";
}

