<?php

namespace App\Criteria;

class HasImpress implements Criterion
{
	private $matches = 0;

	public function process(string $data): bool
	{
		return false;
	}
}
