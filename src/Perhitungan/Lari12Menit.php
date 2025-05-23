<?php

declare(strict_types=1);
/**
 * File ini bagian dari paket yudiandela/garjas.
 *
 * @contact  yudhi.andhela@gmail.com
 * @license  https://github.com/yudiandela/garjas/blob/master/LICENSE
 */

namespace Yudiandela\Garjas\Perhitungan;

use Yudiandela\Garjas\Data\TabelLari12Menit;
use Yudiandela\Garjas\Interface\PerhitunganGarjasInterface;

final class Lari12Menit implements PerhitunganGarjasInterface
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
            'nilai' => $nilai,
        ];
    }
}
