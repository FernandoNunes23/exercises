<?php


class FormValidator
{
	public static function validate(
		$name,
		$secondName,
		$email,
		$phone,
		$login,
		$password
	)
	{
		if (empty($name)) {
			throw new \InvalidArgumentException("Field 'name' cannot be null.");
		}

		if (empty($secondName)) {
			throw new \InvalidArgumentException("Field 'second_name' cannot be null.");
		}

		if (empty($email)) {
			throw new \InvalidArgumentException("Field 'email' cannot be null.");
		}

		if (empty($phone)) {
			throw new \InvalidArgumentException("Field 'phone' cannot be null.");
		}

		if (empty($login)) {
			throw new \InvalidArgumentException("Field 'login' cannot be null.");
		}

		if (empty($password)) {
			throw new \InvalidArgumentException("Field 'password' cannot be null.");
		}

		if(false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new \InvalidArgumentException("Field 'email' in invalid format.");
		}

		if(false == preg_match("/\(?\d{2}\)?\s?\d{5}\-?\d{4}/", $phone)) {
			throw new \InvalidArgumentException("Field 'phone' in invalid format.");
		}
	}
}