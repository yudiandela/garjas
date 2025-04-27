<?php

declare(strict_types=1);
/**
 * File ini bagian dari paket yudiandela/garjas.
 *
 * @contact  yudhi.andhela@gmail.com
 * @license  https://github.com/yudiandela/garjas/blob/master/LICENSE
 */

namespace Yudiandela\Garjas\Interface;

interface TableDataGarjasInterface
{
    /**
     * Mendapatkan nilai.
     */
    public function get(): int;
}
