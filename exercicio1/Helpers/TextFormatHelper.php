<?php

/**
 * Class TextFormatHelper
 */
class TextFormatHelper
{
	const COUNTRY_NAME_PREPOSITIONS_EXCEPTIONS = [
		"EUA" => "os"
	];

	/**
	 * @param string $countryName
	 * @return string
	 */
	private static function definePrepositionByCountryName(string $countryName): string
	{
		$preposition = "o";
		$countryNameParts = explode(" ", $countryName);

		if(!empty(self::COUNTRY_NAME_PREPOSITIONS_EXCEPTIONS[$countryName])) {
			return self::COUNTRY_NAME_PREPOSITIONS_EXCEPTIONS[$countryName];
		}

		if(preg_match("/(a|A)$/", $countryNameParts[0])) {
			$preposition = strtolower(substr($countryNameParts[0], -1));
		}

		if(preg_match("/(s|S)$/", $countryNameParts[0])) {
			$preposition = strtolower(substr($countryNameParts[0], -2));
		}

		return $preposition;
	}

	/**
	 * @param string $countryName
	 * @param $capital
	 *
	 * @return string
	 */
	public static function formatTextToShow(string $countryName, $capital): string
	{
		$preposition = self::definePrepositionByCountryName($countryName);

		$text =  "A capital d{$preposition} {$countryName} e {$capital} \n";

		return $text;
	}
}
