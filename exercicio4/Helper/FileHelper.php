<?php


class FileHelper
{
	const FILENAME = "registros.txt";

	/**
	 * @param $name
	 * @param $secondName
	 * @param $email
	 * @param $phone
	 * @param $login
	 * @param $password
	 */
	public static function addRow($name, $secondName, $email, $phone, $login, $password): void
	{
		$arrayRow = [
			"name" => $name,
			"secondName" => $secondName,
			"email" => $email,
			"phone" => $phone,
			"login" => $login,
			"password" => password_hash($password, PASSWORD_DEFAULT)
		];

		if (false === file_exists(self::FILENAME)) {;
			$row = self::transformArrayToString([$arrayRow]);
		} else {
			$content = file_get_contents(self::FILENAME);
			$fileArray = self::transformContentInArray($content);

			if (self::checkIfLoginAlreadyExists($login, $fileArray)) {
				throw new \InvalidArgumentException("Login already exists.");
			}

			if (self::checkIfEmailAlreadyExists($email, $fileArray)) {
				throw new \InvalidArgumentException("Email already exists.");
			}

			$fileArray[] = $arrayRow;

			$row = self::transformArrayToString($fileArray);
		}

		file_put_contents(self::FILENAME, $row);
	}

	private static function checkIfLoginAlreadyExists($login, $fileArray)
	{
		foreach ($fileArray as $row) {
			if ($login === $row["login"]) {
				return true;
			}
		}

		return false;
	}

	private static function checkIfEmailAlreadyExists($email, $fileArray)
	{
		foreach ($fileArray as $row) {
			if ($email === $row["email"]) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @param array $array
	 *
	 * @return string|null
	 */
	private static function transformArrayToString(array $array) {
		$arrayAsString = var_export($array, true);

		return $arrayAsString;
	}

	/**
	 * @param string $fileContent
	 *
	 * @return mixed
	 */
	private static function transformContentInArray(string $fileContent)
	{
		$fileContentAsArray = eval('return ' . $fileContent .';');

		return $fileContentAsArray;
	}
}