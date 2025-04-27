<?php

declare(strict_types=1);

namespace Yudiandela\Garjas\Interface;

interface TableDataGarjasInterface
{
    /**
     * Mendapatkan nilai.
     *
     * @return int
     */
    public function get(): int;
}
