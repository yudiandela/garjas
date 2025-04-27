<?php

declare(strict_types=1);
/**
 * File ini bagian dari paket yudiandela/garjas.
 *
 * @contact  yudhi.andhela@gmail.com
 * @license  https://github.com/yudiandela/garjas/blob/master/LICENSE
 */

namespace Yudiandela\Garjas\Data;

use Yudiandela\Garjas\Interface\TableDataGarjasInterface;

final class TabelSitUp1Menit implements TableDataGarjasInterface
{
    public int $nilai;

    /**
     * Menghitung nilai sit up berdasarkan kategori umur dan jenis kelamin.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param float $data data sit up
     */
    public function __construct(
        private int $kategoriUmur,
        private string $jenisKelamin,
        private float $data,
    ) {
        $this->nilai = $this->tabelNilaiKelompok($kategoriUmur, $jenisKelamin, $data);
    }

    /**
     * Mendapatkan nilai sit up berdasarkan kategori umur dan jenis kelamin.
     *
     * @return int nilai sit up
     */
    public function get(): int
    {
        return $this->nilai;
    }

    /**
     * Menghitung nilai sit up berdasarkan kategori umur dan jenis kelamin.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param float $data data sit up
     * @return int nilai sit up
     */
    private function tabelNilaiKelompok(int $kategoriUmur, string $jenisKelamin, float $data): int
    {
        return $jenisKelamin == 'pria'
               ? $this->tabelNilaiKelompokPria($kategoriUmur, $data)
               : $this->tabelNilaiKelompokWanita($kategoriUmur, $data);
    }

    /**
     * Menghitung nilai sit up berdasarkan kategori umur dan jenis kelamin pria.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param float $data data sit up
     * @return int nilai sit up
     */
    private function tabelNilaiKelompokPria(int $kategoriUmur, float $data): int
    {
        if ($kategoriUmur == 0) {
            return 0;
        }

        [$dataMaksimal, $nilaiDecrement] = match ($kategoriUmur) {
            1 => [41, 5],
            2 => [40, 5],
            3 => [39, 5],
            4 => [38, 5],
            5 => [37, 5],
            6 => [36, 5],
            7 => [35, 5],
            8 => [34, 5],
            9 => [33, 5],
            10 => [32, 5],
        };

        if ($data <= 0) {
            return 0;
        }

        if ($data >= $dataMaksimal) {
            return 100;
        }

        $nilai = 100;
        for ($i = $dataMaksimal; $i >= $data; --$i) {
            if ($data >= $i) {
                break;
            }

            if ($i <= 32) {
                $nilaiDecrement = 3;
            }

            $nilai -= $nilaiDecrement;
        }

        return $nilai;
    }

    /**
     * Menghitung nilai sit up berdasarkan kategori umur dan jenis kelamin wanita.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param float $data data sit up
     * @return int nilai sit up
     */
    private function tabelNilaiKelompokWanita(int $kategoriUmur, float $data): int
    {
        if ($kategoriUmur == 0) {
            return 0;
        }

        [$dataMaksimal, $nilaiDecrement] = match ($kategoriUmur) {
            1 => [36, 5],
            2 => [35, 5],
            3 => [34, 5],
            4 => [33, 5],
            5 => [32, 5],
            6 => [31, 5],
            7 => [30, 5],
            8 => [29, 5],
            9 => [28, 5],
            10 => [27, 5],
        };

        if ($data <= 0) {
            return 0;
        }

        if ($data >= $dataMaksimal) {
            return 100;
        }

        $nilai = 100;
        for ($i = $dataMaksimal; $i >= $data; --$i) {
            if ($data >= $i) {
                break;
            }

            if ($i <= 27) {
                $nilaiDecrement = 4;
            }

            $nilai -= $nilaiDecrement;
        }

        return $nilai;
    }
}
