<?php

/**
 * Class LocationAddHelper
 */
class LocationAddHelper
{
	/**
	 * Add locations and sort by capital
	 *
	 * @param array $location
	 * @param string $country
	 * @param string $capital
	 *
	 * @return array
	 */
	public static function addLocation(array $location, string $country, string $capital): array
	{
		$location[$country] = $capital;
		asort($location);

		return $location;
	}
}