<?php

declare(strict_types=1);

namespace Yudiandela\Garjas\Data;

class TabelPushUp1Menit
{
    public int $nilai;

    /**
     * Menghitung nilai push up berdasarkan kategori umur dan jenis kelamin.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param float $data data push up
     */
    public function __construct(
        private int $kategoriUmur,
        private string $jenisKelamin,
        private float $data,
    )
    {
        $this->nilai = $this->tabelNilaiKelompok($kategoriUmur, $jenisKelamin, $data);
    }

    /**
     * Mendapatkan nilai push up berdasarkan kategori umur dan jenis kelamin.
     *
     * @return int nilai push up
     */
    public function get(): int
    {
        return $this->nilai;
    }

    /**
     * Menghitung nilai push up berdasarkan kategori umur dan jenis kelamin.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param float $data data push up
     * @return int nilai push up
     */
    private function tabelNilaiKelompok(int $kategoriUmur, string $jenisKelamin, float $data): int
    {
        return $jenisKelamin == 'pria' ?
               $this->tabelNilaiKelompokPria($kategoriUmur, $data) :
               $this->tabelNilaiKelompokWanita($kategoriUmur, $data);
    }

    /**
     * Menghitung nilai push up berdasarkan kategori umur dan jenis kelamin pria.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param float $data data push up
     * @return int nilai push up
     */
    private function tabelNilaiKelompokPria(int $kategoriUmur, float $data): int
    {
        if($kategoriUmur == 0) {
            return 0;
        }

        [$dataMaksimal, $nilaiDecrement] = match ($kategoriUmur) {
            1  => [43, 5],
            2  => [42, 5],
            3  => [41, 5],
            4  => [40, 5],
            5  => [39, 5],
            6  => [38, 5],
            7  => [37, 5],
            8  => [36, 5],
            9  => [35, 5],
            10 => [34, 5],
        };

        if($data <= 0) {
            return 0;
        }

        if($data >= $dataMaksimal) {
            return 100;
        }

        $nilai = 100;
        for ($i = $dataMaksimal; $i >= $data; $i--) {
            if($data >= $i) {
                break;
            }

            if($i <= 34) {
                $nilaiDecrement = 3;
            }

            $nilai -= $nilaiDecrement;
        }

        return $nilai;
    }

    /**
     * Menghitung nilai push up berdasarkan kategori umur dan jenis kelamin wanita.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param float $data data push up
     * @return int nilai push up
     */
    private function tabelNilaiKelompokWanita(int $kategoriUmur, float $data): int
    {
        if($kategoriUmur == 0) {
            return 0;
        }

        [$dataMaksimal, $nilaiDecrement] = match ($kategoriUmur) {
            1  => [28, 5],
            2  => [27, 5],
            3  => [26, 5],
            4  => [25, 5],
            5  => [24, 5],
            6  => [23, 5],
            7  => [22, 5],
            8  => [21, 5],
            9  => [20, 5],
            10 => [19, 5],
        };

        if($data <= 0) {
            return 0;
        }

        if($data >= $dataMaksimal) {
            return 100;
        }

        $nilai = 100;
        for ($i = $dataMaksimal; $i >= $data; $i--) {
            if($data >= $i) {
                break;
            }

            if($i <= 19) {
                $nilaiDecrement = 4;
            }

            $nilai -= $nilaiDecrement;
        }

        return $nilai;
    }
}
