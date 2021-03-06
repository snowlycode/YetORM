<?php

namespace Model\Entities;

use YetORM;


class BaseEntity extends YetORM\Entity
{

	/** @return array */
	public function toArray()
	{
		$ref = static::getReflection();
		$values = [];

		foreach ($ref->getEntityProperties() as $name => $property) {
			$value = $property->getValue($this);

			if (!($value instanceof YetORM\EntityCollection || $value instanceof YetORM\Entity)) {
				$values[$name] = $value;
			}
		}

		return $values;
	}

}
