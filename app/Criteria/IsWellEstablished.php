<?php

namespace App\Criteria;

class IsWellEstablished implements Criterion
{
	public function process(string $data): bool
	{
		return str_contains($data, 'Impressum');
	}
}
