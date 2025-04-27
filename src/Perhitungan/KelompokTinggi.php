<?php declare(strict_types=1);

namespace Yudiandela\Garjas\Perhitungan;

final class KelompokTinggi
{
    public static function check(float|int $tinggiBadan): int
    {
        // Tentukan batas minimal dan maksimal tinggi
        $tinggiBadanMinimal = 150;
        $tinggiBadanMaksimal = 200;

        // Jika tinggi kurang dari batas minimal atau melebihi batas maksimal
        if($tinggiBadan < $tinggiBadanMinimal || $tinggiBadan > $tinggiBadanMaksimal) {
            return 0;
        }

        // Jika tinggi sama dengan batas maksimal
        if($tinggiBadan == $tinggiBadanMaksimal) {
            return 101;
        }

        $kelompok = 1;
        for($i = $tinggiBadanMinimal; $i <= $tinggiBadanMaksimal; $i = $i + 0.5) {

            if($tinggiBadan == $i) {
                return $kelompok;
            }

            $kelompok++;
        }

        return 0;
    }
}
