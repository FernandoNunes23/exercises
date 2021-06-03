<?php


class XmlParserHelper
{
	private $csvFileHasHeaders;
	private $csvFileName;
	private $xmlFileName;

	public function __construct(
		string $csvFileName,
		string $xmlFileName
	)
	{
		$this->csvFileName = $csvFileName;
		$this->xmlFileName = $xmlFileName;
		$this->csvFileHasHeaders = false;
	}

	private function transformXmlNodeToArray($xmlNode)
	{
		$nodeAsArray = get_object_vars($xmlNode);

		if (!empty($nodeAsArray["@attributes"])) {
			foreach ($xmlNode->attributes() as $attributeKey => $attributeValue) {
				$nodeAsArray = [$attributeKey => (string) $attributeValue] + $nodeAsArray;
			}

			unset($nodeAsArray["@attributes"]);
		}

		foreach ($nodeAsArray as $index => $value) {
			if (is_object($value)) {
				foreach (get_object_vars($value) as $additionalIndexHeader => $additionalIndexValue) {
					$additionalIndex = sprintf("%s/%s", $index, $additionalIndexHeader);
					$nodeAsArray[$additionalIndex] = $additionalIndexValue;
				}

				unset($nodeAsArray[$index]);
			}
		}

		return $nodeAsArray;
	}

	public function generateCsvFileFromXml()
	{
		$xml = simplexml_load_file($this->xmlFileName);
		$csvFile = fopen($this->csvFileName, 'w');
		$numberOfLevels = $this->countLevels($xml);
		$this->transformXmlToCsv($xml, $csvFile, $numberOfLevels);
		fclose($csvFile);
	}

	private function transformXmlToCsv($xml, $csvFile, $level = 1, $actualLevel = 1)
	{
		foreach ($xml->children() as $childNode) {
			if ($actualLevel == ($level - 1)) {

				$nodeAsArray = XmlParserHelper::transformXmlNodeToArray($childNode);

				if (!$this->csvFileHasHeaders) {
					$headers = array_keys($nodeAsArray);
					fputcsv($csvFile, $headers, ',');
					$this->csvFileHasHeaders = true;
				}

				foreach ($childNode->attributes() as $attributeKey => $attributeValue) {
					$data[] = (string) $attributeValue;
				}

				foreach ($childNode->children() as $dataNode) {
					if (is_object($dataNode)) {
						foreach (get_object_vars($dataNode) as $value) {
							$data[] = $value;
						}

						continue;
					}

					$data[] = $dataNode;
				}

				fputcsv($csvFile, $data, ',');
				unset($data);
			} else {
				$actualLevel += 1;
				$this->transformXmlToCsv($childNode, $csvFile, $level, $actualLevel);
			}
		}
	}

	private function countLevels($xml, $numberOfLevels = 1) {
		foreach ($xml->children() as $childNode) {
			$hasChild = (count($childNode->children()) > 0) ? true : false;

			if ($hasChild) {
				$numberOfLevels += 1;
				self::countLevels($childNode, $numberOfLevels);
			}

			return $numberOfLevels;
		}
	}
}