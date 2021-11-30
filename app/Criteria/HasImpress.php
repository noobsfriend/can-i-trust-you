<?php

namespace App\Criteria;

class HasImpress implements Criterion
{
	public function process(string $data): bool
	{
		return str_contains($data, 'Impressum');
	}
}
