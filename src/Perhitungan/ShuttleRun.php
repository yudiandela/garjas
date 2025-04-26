<?php

declare(strict_types=1);

namespace Yudiandela\Garjas\Perhitungan;

use Yudiandela\Garjas\Data\TableShuttleRun;

class ShuttleRun
{
    /**
     * Mengecek kategori berdasarkan umur dan jenis kelamin
     * lalu menghitung nilai shuttle run berdasarkan data yang diberikan.
     *
     * @param int $umur
     * @param string $jenisKelamin
     * @param float $data
     * @return array
     */
    public static function check(int $umur, string $jenisKelamin, float $data): array
    {
        // Mengambil data kategori berdasarkan umur
        $kategoriUmur = KategoriUmur::check($umur);

        // Hitung nilai sit up
        $nilai = new TableShuttleRun($kategoriUmur, $jenisKelamin, $data)->get();

        return [
            'shuttle_run' => $data,
            'nilai' => $nilai
        ];
    }
}
