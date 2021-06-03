<?php


class SelectCreationHelper
{
	private $optionValues;
	private $label;
	private $attributes;

	public function setLabel(string $value)
	{
		if (empty($this->attributes["name"])) {
			throw new \Exception("Needs to set select name attribute first.");
		}

		$this->label = $value;
	}

	public function setName(string $name)
	{
		$this->attributes["name"] = $name;
	}

	public function setSelectId(string $id)
	{
		$this->attributes["id"] = $id;
	}

	public function setSelectClasses(array $classes)
	{
		$this->attributes["classes"] = $classes;
	}

	public function setValues(array $optionValues)
	{
		$this->optionValues = $optionValues;
	}

	private function makeSelectAttributes()
	{
		$selectAttributesString = "";

		foreach ($this->attributes as $attributeName => $attributeValue) {
			if ($attributeName == "classes") {
				$classesString = "";
				foreach ($attributeValue as $class) {
					$classesString .= "{$class} ";
				}

				$attributeValue = $classesString;
				$attributeName = "class";
			}

			$selectAttributesString .= "{$attributeName}=\"{$attributeValue}\"";
		}

		return $selectAttributesString;
	}

	private function makeOptions()
	{
		$optionsTagString = "";

		foreach($this->optionValues as $value){
			$optionsTagString .= "<option value=\"$value\">" .ucfirst($value). "</option>\n";
		}

		return $optionsTagString;
	}

	public function makeSelect()
	{
		$selectTagString = "";

		if (!empty($this->label)) {
			$selectTagString .= "<label for=\"{$this->attributes["name"]}\">{$this->label}</label>";
		}

		$selectTagString .= "<select ";
		$selectTagString .= $this->makeSelectAttributes();
		$selectTagString .= ">\n";
		$selectTagString .= $this->makeOptions();
		$selectTagString .= "</select>" ;

		return $selectTagString;
	}
}