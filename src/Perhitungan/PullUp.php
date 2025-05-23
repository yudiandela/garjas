<?php

declare(strict_types=1);
/**
 * File ini bagian dari paket yudiandela/garjas.
 *
 * @contact  yudhi.andhela@gmail.com
 * @license  https://github.com/yudiandela/garjas/blob/master/LICENSE
 */

namespace Yudiandela\Garjas\Perhitungan;

use Yudiandela\Garjas\Data\TabelPullUp1Menit;
use Yudiandela\Garjas\Interface\PerhitunganGarjasInterface;

final class PullUp implements PerhitunganGarjasInterface
{
    /**
     * Mengecek kategori berdasarkan umur dan jenis kelamin
     * lalu menghitung nilai pull up berdasarkan data yang diberikan.
     */
    public static function check(int $umur, string $jenisKelamin, float $data): array
    {
        // Mengambil data kategori berdasarkan umur
        $kategoriUmur = KategoriUmur::check($umur);

        // Hitung nilai pull up
        $nilai = new TabelPullUp1Menit($kategoriUmur, $jenisKelamin, $data)->get();

        return [
            'pull_up_1_menit' => $data,
            'nilai' => $nilai,
        ];
    }
}
