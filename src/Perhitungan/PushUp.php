<?php

declare(strict_types=1);

namespace Yudiandela\Garjas\Perhitungan;

use Yudiandela\Garjas\Data\TabelPushUp1Menit;

class PushUp
{
    /**
     * Mengecek kategori berdasarkan umur dan jenis kelamin
     * lalu menghitung nilai push up berdasarkan data yang diberikan.
     *
     * @param int $umur
     * @param string $jenisKelamin
     * @param int $data
     * @return array
     */
    public static function check(int $umur, string $jenisKelamin, int $data): array
    {
        // Mengambil data kategori berdasarkan umur
        $kategoriUmur = KategoriUmur::check($umur);

        // Hitung nilai sit up
        $nilai = new TabelPushUp1Menit($kategoriUmur, $jenisKelamin, $data)->get();

        return [
            'push_up_1_menit' => $data,
            'nilai' => $nilai
        ];
    }
}
