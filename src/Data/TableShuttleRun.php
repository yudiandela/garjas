<?php

declare(strict_types=1);

namespace Yudiandela\Garjas\Data;

class TableShuttleRun
{
    public int $nilai;

    /**
     * Membuat instance dari kelas ini.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param float $data data shuttle run
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
     * Mendapatkan nilai shuttle run.
     *
     * @return int
     */
    public function get(): int
    {
        return $this->nilai;
    }

    /**
     * Menghitung nilai shuttle run berdasarkan kategori umur dan jenis kelamin.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param float $data data shuttle run
     * @return int
     */
    private function tabelNilaiKelompok($kategoriUmur, $jenisKelamin, $data)
    {
        return $jenisKelamin == 'pria' ?
               $this->tabelNilaiKelompokPria($kategoriUmur, $data) :
               $this->tabelNilaiKelompokWanita($kategoriUmur, $data);
    }

    /**
     * Menghitung nilai shuttle run berdasarkan kategori umur dan jenis kelamin pria.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param float $data data shuttle run
     * @return int
     */
    private function tabelNilaiKelompokPria(int $kategoriUmur, float $data): int
    {
        if($kategoriUmur == 0) {
            return 0;
        }

        [$nilaiMaksimal, $nilaiIncrement] = match ($kategoriUmur) {
            1  => [15.90, 0.1],
            2  => [16.40, 0.1],
            3  => [16.90, 0.1],
            4  => [17.40, 0.1],
            5  => [17.90, 0.1],
            6  => [18.40, 0.1],
            7  => [18.90, 0.1],
            8  => [19.40, 0.1],
            9  => [19.90, 0.1],
            10 => [20.40, 0.1],
        };

        if($data <= $nilaiMaksimal) {
            return 100;
        }

        $nilai = 100;
        for($i = $nilaiMaksimal; $i <= $data; $i += $nilaiIncrement) {
            $nilai--;
        }

        return $nilai;
    }

    /**
     * Menghitung nilai shuttle run berdasarkan kategori umur dan jenis kelamin wanita.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param float $data data shuttle run
     * @return int
     */
    private function tabelNilaiKelompokWanita(int $kategoriUmur, float $data): int
    {
        if($kategoriUmur == 0) {
            return 0;
        }

        [$nilaiMaksimal, $nilaiIncrement] = match ($kategoriUmur) {
            1  => [17.20, 0.1],
            2  => [17.70, 0.1],
            3  => [18.20, 0.1],
            4  => [18.70, 0.1],
            5  => [19.20, 0.1],
            6  => [19.70, 0.1],
            7  => [20.20, 0.1],
            8  => [20.70, 0.1],
            9  => [21.20, 0.1],
            10 => [21.70, 0.1],
        };

        if($data <= $nilaiMaksimal) {
            return 100;
        }

        $nilai = 100;
        for($i = $nilaiMaksimal; $i <= $data; $i += $nilaiIncrement) {
            $nilai--;
        }

        return $nilai;
    }
}
