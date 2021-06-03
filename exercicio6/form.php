<form action="form.php" method="post">
	<?php

	require_once("Helpers/SelectCreationHelper.php");

	$optionsValues = [
		"tecnologia",
		"varejo",
		"industria",
	];

	$selectCreationHelper = new SelectCreationHelper();
	$selectCreationHelper->setName("teste");
	$selectCreationHelper->setLabel("Área de atuação: ");
	$selectCreationHelper->setSelectId("idTeste");
	$selectCreationHelper->setSelectClasses(["input", "test"]);
	$selectCreationHelper->setValues($optionsValues);

	echo $selectCreationHelper->makeSelect();

	?>

	<button type="submit">Enviar</button>
</form>