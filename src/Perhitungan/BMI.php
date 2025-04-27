<?php

declare(strict_types=1);
/**
 * File ini bagian dari paket yudiandela/garjas.
 *
 * @contact  yudhi.andhela@gmail.com
 * @license  https://github.com/yudiandela/garjas/blob/master/LICENSE
 */

namespace Yudiandela\Garjas\Perhitungan;

use Yudiandela\Garjas\Enums\BMIKategori;
use Yudiandela\Garjas\Enums\BMIRange;

final class BMI
{
    /**
     * Mengecek kategori berdasarkan berat badan dan tinggi badan
     * lalu menghitung nilai BMI berdasarkan data yang diberikan.
     *
     * @param float $beratBadan berat badan dalam kilogram
     * @param float $tinggiBadan tinggi badan dalam sentimeter
     * @return array berisi data kategori, range BMI, dan nilai BMI
     */
    public static function check(float $beratBadan, float $tinggiBadan): array
    {
        // Ubah tinggi dari cm ke meter
        $tinggiBadan = (float) $tinggiBadan / 100;

        // Hitung BMI
        $bmi = (float) round($beratBadan / ($tinggiBadan * $tinggiBadan), 2);

        return match (true) {
            $bmi <= 19.5 => ['kategori' => BMIKategori::LLB->value, 'range_bmi' => BMIRange::LLB->value, 'bmi' => $bmi],
            $bmi <= 20.3 => ['kategori' => BMIKategori::LB->value, 'range_bmi' => BMIRange::LB->value, 'bmi' => $bmi],
            $bmi <= 21.1 => ['kategori' => BMIKategori::NB->value, 'range_bmi' => BMIRange::NB->value, 'bmi' => $bmi],
            $bmi <= 22.4 => ['kategori' => BMIKategori::HB->value, 'range_bmi' => BMIRange::HB->value, 'bmi' => $bmi],
            $bmi <= 23.7 => ['kategori' => BMIKategori::IB->value, 'range_bmi' => BMIRange::IB->value, 'bmi' => $bmi],
            $bmi <= 25.0 => ['kategori' => BMIKategori::IA->value, 'range_bmi' => BMIRange::IA->value, 'bmi' => $bmi],
            $bmi <= 26.2 => ['kategori' => BMIKategori::HA->value, 'range_bmi' => BMIRange::HA->value, 'bmi' => $bmi],
            $bmi <= 27.1 => ['kategori' => BMIKategori::NA->value, 'range_bmi' => BMIRange::NA->value, 'bmi' => $bmi],
            $bmi <= 28.2 => ['kategori' => BMIKategori::LA->value, 'range_bmi' => BMIRange::LA->value, 'bmi' => $bmi],
            default => ['kategori' => BMIKategori::LLA->value, 'range_bmi' => BMIRange::LLA->value, 'bmi' => $bmi],
        };
    }
}
