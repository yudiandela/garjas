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

final class TabelPullUp1Menit implements TableDataGarjasInterface
{
    public int $nilai;

    /**
     * Menghitung nilai pull up berdasarkan kategori umur dan jenis kelamin.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param float $data data pull up
     */
    public function __construct(
        private int $kategoriUmur,
        private string $jenisKelamin,
        private float $data,
    ) {
        $this->nilai = $this->tabelNilaiKelompok($kategoriUmur, $jenisKelamin, $data);
    }

    /**
     * Mendapatkan nilai pull up berdasarkan kategori umur dan jenis kelamin.
     *
     * @return int nilai pull up
     */
    public function get(): int
    {
        return $this->nilai;
    }

    /**
     * Menghitung nilai pull up berdasarkan kategori umur dan jenis kelamin.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param float $data data pull up
     * @return int nilai pull up
     */
    private function tabelNilaiKelompok(int $kategoriUmur, string $jenisKelamin, float $data): int
    {
        return $jenisKelamin == 'pria'
               ? $this->tabelNilaiKelompokPria($kategoriUmur, $data)
               : $this->tabelNilaiKelompokWanita($kategoriUmur, $data);
    }

    /**
     * Menghitung nilai pull up berdasarkan kategori umur dan jenis kelamin pria.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param float $data data pull up
     * @return int nilai pull up
     */
    private function tabelNilaiKelompokPria(int $kategoriUmur, float $data): int
    {
        if ($kategoriUmur == 0) {
            return 0;
        }

        [$dataMaksimal, $nilaiDecrement] = match ($kategoriUmur) {
            1 => [18, 5],
            2 => [17, 5],
            3 => [16, 5],
            4 => [15, 5],
            5 => [14, 5],
            6 => [13, 5],
            7 => [12, 5],
            8 => [11, 5],
            9 => [10, 5],
            10 => [9, 5],
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

            $nilai -= $nilaiDecrement;
        }

        return $nilai;
    }

    /**
     * Menghitung nilai pull up berdasarkan kategori umur dan jenis kelamin wanita.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param float $data data pull up
     * @return int nilai pull up
     */
    private function tabelNilaiKelompokWanita(int $kategoriUmur, float $data): int
    {
        if ($kategoriUmur == 0) {
            return 0;
        }

        return match ($kategoriUmur) {
            1 => match (true) {
                $data >= 63 => 100,
                $data == 62 => 98,
                $data == 61 => 97,
                $data == 60 => 95,
                $data == 59 => 93,
                $data == 58 => 92,
                $data == 57 => 90,
                $data == 56 => 88,
                $data == 55 => 87,
                $data == 54 => 85,
                $data == 53 => 83,
                $data == 52 => 82,
                $data == 51 => 80,
                $data == 50 => 78,
                $data == 49 => 77,
                $data == 48 => 75,
                $data == 47 => 73,
                $data == 46 => 72,
                $data == 45 => 70,
                $data == 44 => 68,
                $data == 43 => 67,
                $data == 42 => 65,
                $data == 41 => 63,
                $data == 40 => 62,
                $data == 39 => 60,
                $data == 38 => 58,
                $data == 37 => 57,
                $data == 36 => 55,
                $data == 35 => 53,
                $data == 34 => 51,
                $data == 33 => 49,
                $data == 32 => 46,
                $data == 31 => 43,
                $data == 30 => 39,
                $data == 29 => 37,
                $data == 28 => 35,
                $data == 27 => 33,
                $data == 26 => 31,
                $data == 25 => 29,
                $data == 24 => 26,
                $data == 23 => 24,
                $data == 22 => 22,
                $data == 21 => 20,
                $data == 20 => 18,
                $data == 19 => 16,
                $data == 18 => 14,
                $data == 17 => 12,
                $data == 16 => 10,
                $data == 15 => 8,
                $data == 14 => 6,
                $data == 13 => 4,
                $data == 12 => 2,
                $data == 11 => 0,
                default => 0,
            },
            2 => match (true) {
                $data >= 60 => 100,
                $data == 59 => 98,
                $data == 58 => 97,
                $data == 57 => 95,
                $data == 56 => 93,
                $data == 55 => 92,
                $data == 54 => 90,
                $data == 53 => 88,
                $data == 52 => 87,
                $data == 51 => 85,
                $data == 50 => 83,
                $data == 49 => 82,
                $data == 48 => 80,
                $data == 47 => 78,
                $data == 46 => 77,
                $data == 45 => 75,
                $data == 44 => 73,
                $data == 43 => 72,
                $data == 42 => 70,
                $data == 41 => 68,
                $data == 40 => 67,
                $data == 39 => 65,
                $data == 38 => 63,
                $data == 37 => 62,
                $data == 36 => 60,
                $data == 35 => 58,
                $data == 34 => 56,
                $data == 33 => 54,
                $data == 32 => 51,
                $data == 31 => 48,
                $data == 30 => 44,
                $data == 29 => 42,
                $data == 28 => 40,
                $data == 27 => 38,
                $data == 26 => 36,
                $data == 25 => 34,
                $data == 24 => 31,
                $data == 23 => 29,
                $data == 22 => 27,
                $data == 21 => 25,
                $data == 20 => 23,
                $data == 19 => 21,
                $data == 18 => 19,
                $data == 17 => 17,
                $data == 16 => 15,
                $data == 15 => 13,
                $data == 14 => 11,
                $data == 13 => 9,
                $data == 12 => 7,
                $data == 11 => 5,
                $data == 10 => 3,
                $data == 9 => 1,
                default => 0,
            },
            3 => match (true) {
                $data >= 57 => 100,
                $data == 56 => 98,
                $data == 55 => 97,
                $data == 54 => 95,
                $data == 53 => 93,
                $data == 52 => 92,
                $data == 51 => 90,
                $data == 50 => 88,
                $data == 49 => 87,
                $data == 48 => 85,
                $data == 47 => 83,
                $data == 46 => 82,
                $data == 45 => 80,
                $data == 44 => 78,
                $data == 43 => 77,
                $data == 42 => 75,
                $data == 41 => 73,
                $data == 40 => 72,
                $data == 39 => 70,
                $data == 38 => 68,
                $data == 37 => 67,
                $data == 36 => 65,
                $data == 35 => 63,
                $data == 34 => 61,
                $data == 33 => 59,
                $data == 32 => 56,
                $data == 31 => 53,
                $data == 30 => 49,
                $data == 29 => 47,
                $data == 28 => 45,
                $data == 27 => 43,
                $data == 26 => 41,
                $data == 25 => 39,
                $data == 24 => 36,
                $data == 23 => 34,
                $data == 22 => 32,
                $data == 21 => 30,
                $data == 20 => 28,
                $data == 19 => 26,
                $data == 18 => 24,
                $data == 17 => 22,
                $data == 16 => 20,
                $data == 15 => 18,
                $data == 14 => 16,
                $data == 13 => 14,
                $data == 12 => 12,
                $data == 11 => 10,
                $data == 10 => 8,
                $data == 9 => 6,
                default => 0,
            },
            4 => match (true) {
                $data >= 54 => 100,
                $data == 53 => 98,
                $data == 52 => 97,
                $data == 51 => 95,
                $data == 50 => 93,
                $data == 49 => 92,
                $data == 48 => 90,
                $data == 47 => 88,
                $data == 46 => 87,
                $data == 45 => 85,
                $data == 44 => 83,
                $data == 43 => 82,
                $data == 42 => 80,
                $data == 41 => 78,
                $data == 40 => 77,
                $data == 39 => 75,
                $data == 38 => 73,
                $data == 37 => 72,
                $data == 36 => 70,
                $data == 35 => 68,
                $data == 34 => 66,
                $data == 33 => 64,
                $data == 32 => 61,
                $data == 31 => 58,
                $data == 30 => 54,
                $data == 29 => 52,
                $data == 28 => 50,
                $data == 27 => 48,
                $data == 26 => 46,
                $data == 25 => 44,
                $data == 24 => 41,
                $data == 23 => 39,
                $data == 22 => 37,
                $data == 21 => 35,
                $data == 20 => 33,
                $data == 19 => 31,
                $data == 18 => 29,
                $data == 17 => 27,
                $data == 16 => 25,
                $data == 15 => 23,
                $data == 14 => 21,
                $data == 13 => 19,
                $data == 12 => 17,
                $data == 11 => 15,
                $data == 10 => 13,
                $data == 9 => 11,
                default => 0,
            },
            5 => match (true) {
                $data >= 51 => 100,
                $data == 50 => 98,
                $data == 49 => 97,
                $data == 48 => 95,
                $data == 47 => 93,
                $data == 46 => 92,
                $data == 45 => 90,
                $data == 44 => 88,
                $data == 43 => 87,
                $data == 42 => 85,
                $data == 41 => 83,
                $data == 40 => 82,
                $data == 39 => 80,
                $data == 38 => 78,
                $data == 37 => 77,
                $data == 36 => 75,
                $data == 35 => 73,
                $data == 34 => 71,
                $data == 33 => 69,
                $data == 32 => 66,
                $data == 31 => 63,
                $data == 30 => 59,
                $data == 29 => 57,
                $data == 28 => 55,
                $data == 27 => 53,
                $data == 26 => 51,
                $data == 25 => 49,
                $data == 24 => 46,
                $data == 23 => 44,
                $data == 22 => 42,
                $data == 21 => 40,
                $data == 20 => 38,
                $data == 19 => 36,
                $data == 18 => 34,
                $data == 17 => 32,
                $data == 16 => 30,
                $data == 15 => 28,
                $data == 14 => 26,
                $data == 13 => 24,
                $data == 12 => 22,
                $data == 11 => 20,
                $data == 10 => 18,
                $data == 9 => 16,
                default => 0,
            },
            6 => match (true) {
                $data >= 48 => 100,
                $data == 47 => 98,
                $data == 46 => 97,
                $data == 45 => 95,
                $data == 44 => 93,
                $data == 43 => 92,
                $data == 42 => 90,
                $data == 41 => 88,
                $data == 40 => 87,
                $data == 39 => 85,
                $data == 38 => 83,
                $data == 37 => 82,
                $data == 36 => 80,
                $data == 35 => 78,
                $data == 34 => 76,
                $data == 33 => 74,
                $data == 32 => 71,
                $data == 31 => 68,
                $data == 30 => 64,
                $data == 29 => 62,
                $data == 28 => 60,
                $data == 27 => 58,
                $data == 26 => 56,
                $data == 25 => 54,
                $data == 24 => 51,
                $data == 23 => 49,
                $data == 22 => 47,
                $data == 21 => 45,
                $data == 20 => 43,
                $data == 19 => 41,
                $data == 18 => 39,
                $data == 17 => 37,
                $data == 16 => 35,
                $data == 15 => 33,
                $data == 14 => 31,
                $data == 13 => 29,
                $data == 12 => 27,
                $data == 11 => 25,
                $data == 10 => 23,
                $data == 9 => 21,
                default => 0,
            },
            7 => match (true) {
                $data >= 45 => 100,
                $data == 44 => 98,
                $data == 43 => 97,
                $data == 42 => 95,
                $data == 41 => 93,
                $data == 40 => 92,
                $data == 39 => 90,
                $data == 38 => 88,
                $data == 37 => 87,
                $data == 36 => 85,
                $data == 35 => 83,
                $data == 34 => 81,
                $data == 33 => 79,
                $data == 32 => 76,
                $data == 31 => 73,
                $data == 30 => 69,
                $data == 29 => 67,
                $data == 28 => 65,
                $data == 27 => 63,
                $data == 26 => 61,
                $data == 25 => 59,
                $data == 24 => 56,
                $data == 23 => 54,
                $data == 22 => 52,
                $data == 21 => 50,
                $data == 20 => 48,
                $data == 19 => 46,
                $data == 18 => 44,
                $data == 17 => 42,
                $data == 16 => 40,
                $data == 15 => 38,
                $data == 14 => 36,
                $data == 13 => 34,
                $data == 12 => 32,
                $data == 11 => 30,
                $data == 10 => 28,
                $data == 9 => 26,
                default => 0,
            },
            8 => match (true) {
                $data >= 42 => 100,
                $data == 41 => 98,
                $data == 40 => 97,
                $data == 39 => 95,
                $data == 38 => 93,
                $data == 37 => 92,
                $data == 36 => 90,
                $data == 35 => 88,
                $data == 34 => 86,
                $data == 33 => 84,
                $data == 32 => 81,
                $data == 31 => 78,
                $data == 30 => 74,
                $data == 29 => 72,
                $data == 28 => 70,
                $data == 27 => 68,
                $data == 26 => 66,
                $data == 25 => 64,
                $data == 24 => 61,
                $data == 23 => 59,
                $data == 22 => 57,
                $data == 21 => 55,
                $data == 20 => 53,
                $data == 19 => 51,
                $data == 18 => 49,
                $data == 17 => 47,
                $data == 16 => 45,
                $data == 15 => 43,
                $data == 14 => 41,
                $data == 13 => 39,
                $data == 12 => 37,
                $data == 11 => 35,
                $data == 10 => 33,
                $data == 9 => 31,
                default => 0,
            },
            9 => match (true) {
                $data >= 39 => 100,
                $data == 38 => 98,
                $data == 37 => 97,
                $data == 36 => 95,
                $data == 35 => 93,
                $data == 34 => 91,
                $data == 33 => 89,
                $data == 32 => 86,
                $data == 31 => 83,
                $data == 30 => 79,
                $data == 29 => 77,
                $data == 28 => 75,
                $data == 27 => 73,
                $data == 26 => 71,
                $data == 25 => 69,
                $data == 24 => 66,
                $data == 23 => 64,
                $data == 22 => 62,
                $data == 21 => 60,
                $data == 20 => 58,
                $data == 19 => 56,
                $data == 18 => 54,
                $data == 17 => 52,
                $data == 16 => 50,
                $data == 15 => 48,
                $data == 14 => 46,
                $data == 13 => 44,
                $data == 12 => 42,
                $data == 11 => 40,
                $data == 10 => 38,
                $data == 9 => 36,
                default => 0,
            },
            10 => match (true) {
                $data >= 36 => 100,
                $data == 35 => 98,
                $data == 34 => 96,
                $data == 33 => 94,
                $data == 32 => 91,
                $data == 31 => 88,
                $data == 30 => 84,
                $data == 29 => 82,
                $data == 28 => 80,
                $data == 27 => 78,
                $data == 26 => 76,
                $data == 25 => 74,
                $data == 24 => 71,
                $data == 23 => 69,
                $data == 22 => 67,
                $data == 21 => 65,
                $data == 20 => 63,
                $data == 19 => 61,
                $data == 18 => 59,
                $data == 17 => 57,
                $data == 16 => 55,
                $data == 15 => 53,
                $data == 14 => 51,
                $data == 13 => 49,
                $data == 12 => 47,
                $data == 11 => 45,
                $data == 10 => 43,
                $data == 9 => 41,
                default => 0,
            },
            default => [0, 0],
        };
    }
}
