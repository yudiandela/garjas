<?php

declare(strict_types=1);

namespace Yudiandela\Garjas\Data;

class TabelLari12Menit
{
    public int $nilai;

    /**
     * Membuat instance dari kelas ini.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param int $data data lari 12 menit
     */
    public function __construct(
        private int $kategoriUmur,
        private string $jenisKelamin,
        private int $data,
    )
    {
        $this->nilai = $this->tabelNilaiKelompok($kategoriUmur, $jenisKelamin, $data);
    }

    /**
     * Mendapatkan nilai lari 12 menit.
     *
     * @return int
     */
    public function get(): int
    {
        return $this->nilai;
    }

    /**
     * Menghitung nilai lari 12 menit berdasarkan kategori umur dan jenis kelamin.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param string $jenisKelamin jenis kelamin (pria/wanita)
     * @param int $data data lari 12 menit
     * @return int
     */
    private function tabelNilaiKelompok($kategoriUmur, $jenisKelamin, $data)
    {
        return $jenisKelamin == 'pria' ?
               $this->tabelNilaiKelompokPria($kategoriUmur, $data) :
               $this->tabelNilaiKelompokWanita($kategoriUmur, $data);
    }

    /**
     * Menghitung nilai lari 12 menit berdasarkan kategori umur dan jenis kelamin pria.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param int $data data lari 12 menit
     * @return int
     */
    private function tabelNilaiKelompokPria(int $kategoriUmur, int $data): int
    {
        if($kategoriUmur == 0) {
            return 0;
        }

        [$dataMaksimal, $nilaiDecrement] = match ($kategoriUmur) {
            1  => [3507, 19],
            2  => [3412, 19],
            3  => [3317, 19],
            4  => [3222, 19],
            5  => [3127, 19],
            6  => [3032, 19],
            7  => [2937, 19],
            8  => [2842, 19],
            9  => [2747, 19],
            10 => [2652, 19],
        };

        if($data >= $dataMaksimal) {
            return 100;
        }

        $nilai = 100;
        for ($i = $dataMaksimal; $i > $data; $i = $i - $nilaiDecrement) {
            if($data >= $i) {
                break;
            }

            $nilai--;
        }

        return $nilai;
    }

    /**
     * Menghitung nilai lari 12 menit berdasarkan kategori umur dan jenis kelamin wanita.
     *
     * @param int $kategoriUmur kategori umur (1-10)
     * @param int $data data lari 12 menit
     * @return int
     */
    private function tabelNilaiKelompokWanita(int $kategoriUmur, int $data): int
    {
        if($kategoriUmur == 0) {
            return 0;
        }

        [$dataMaksimal, $nilaiDecrement] = match ($kategoriUmur) {
            1  => [2630, 11],
            2  => [2575, 11],
            3  => [2520, 11],
            4  => [2465, 11],
            5  => [2410, 11],
            6  => [2355, 11],
            7  => [2300, 11],
            8  => [2245, 11],
            9  => [2190, 11],
            10 => [2135, 11],
        };

        if($data >= $dataMaksimal) {
            return 100;
        }

        $nilai = 100;
        for ($i = $dataMaksimal; $i > $data; $i = $i - $nilaiDecrement) {
            if($data >= $i) {
                break;
            }

            $nilai--;
        }

        return $nilai;
    }
}
