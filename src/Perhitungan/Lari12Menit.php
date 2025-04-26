<?php

declare(strict_types=1);

namespace Yudiandela\Garjas\Perhitungan;

use Yudiandela\Garjas\Data\TabelLari12Menit;

class Lari12Menit
{
    /**
     * Menghitung nilai lari 12 menit berdasarkan umur, jenis kelamin, dan data yang diberikan.
     *
     * @param int $umur umur
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param float $data data lari 12 menit
     * @return array berisi data lari 12 menit dan nilai
     */
    public static function check(int $umur, string $jenisKelamin, float $data): array
    {
        // Mengambil data kategori berdasarkan umur
        $kategoriUmur = KategoriUmur::check($umur);

        // Hitung nilai lari
        $nilai = new TabelLari12Menit($kategoriUmur, $jenisKelamin, $data)->get();

        return [
            'lari_12_menit' => $data,
            'nilai' => $nilai
        ];
    }
}
