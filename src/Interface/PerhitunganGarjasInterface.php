<?php

declare(strict_types=1);
/**
 * File ini bagian dari paket yudiandela/garjas.
 *
 * @contact  yudhi.andhela@gmail.com
 * @license  https://github.com/yudiandela/garjas/blob/master/LICENSE
 */

namespace Yudiandela\Garjas\Interface;

interface PerhitunganGarjasInterface
{
    /**
     * Menghitung nilai berdasarkan umur, jenis kelamin, dan data yang diberikan.
     *
     * @param int $umur umur
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param float $data data
     * @return array berisi data dan nilai
     */
    public static function check(int $umur, string $jenisKelamin, float $data): array;
}
