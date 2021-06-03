<?php

require_once("Helpers/FileHelper.php");

$files = [
	"music.mp4",
	"video.mov",
	"imagem.jpeg"
];

$orderedExtensions = FileHelper::getFilesExtensionsOrdered($files);

foreach ($orderedExtensions as $key => $extension) {
	$index = $key += 1;

	if ($extension === null) {
		continue;
	}

	echo $index . " ." . $extension . "\n";
}