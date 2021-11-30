<?php

namespace App\Criteria;

class HasNoHiddenText implements Criterion
{
	public function process(string $data): bool
	{
		// take screenshots with https://github.com/symfony/panther

		return false;
	}
}
