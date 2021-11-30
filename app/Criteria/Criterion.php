<?php

namespace App\Criteria;

interface Criterion
{
    public function process(string $data): bool;
}
