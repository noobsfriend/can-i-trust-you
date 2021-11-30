<?php

namespace App\Criteria;

class HasReasonableAmountOfTrackers implements Criterion
{
	private $count = 0;

	public function process(string $data): bool
	{
		// https://github.com/duckduckgo/tracker-radar-detector


		return $this->count <= 1;
	}
}
