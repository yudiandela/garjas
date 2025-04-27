<?php declare(strict_types=1);

namespace Yudiandela\Garjas\Perhitungan;

final class KategoriUmur
{
    public static function check(int $umur): int
    {
        return match(true) {
            $umur >= 18 && $umur <= 25 => 1,
            $umur >= 26 && $umur <= 30 => 2,
            $umur >= 31 && $umur <= 35 => 3,
            $umur >= 36 && $umur <= 40 => 4,
            $umur >= 41 && $umur <= 43 => 5,
            $umur >= 44 && $umur <= 46 => 6,
            $umur >= 47 && $umur <= 49 => 7,
            $umur >= 50 && $umur <= 52 => 8,
            $umur >= 53 && $umur <= 55 => 9,
            $umur >= 56 && $umur <= 58 => 10,
            default => 0
        };
    }
}
