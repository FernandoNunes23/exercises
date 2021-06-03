<?php


class FileHelper
{
	public static function getFilesExtensionsOrdered(array $files)
	{
		$extensions = [];

		foreach ($files as $file) {
			$extensions[] = self::getExtension($file);
		}

		sort($extensions);

		return $extensions;
	}

	private static function getExtension(string $filename): ?string
	{
		$filenameParts = explode(".", $filename);

		$extension = end($filenameParts);

		if ($filenameParts[0] === $filename) {
			return null;
		}

		return $extension;
	}
}