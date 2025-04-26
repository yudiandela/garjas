<?php

use Yudiandela\Garjas\Perhitungan\KategoriUmur;

$datas = [
    ['umur' => 18, 'kategori' => 1],
    ['umur' => 26, 'kategori' => 2],
    ['umur' => 31, 'kategori' => 3],
    ['umur' => 36, 'kategori' => 4],
    ['umur' => 41, 'kategori' => 5],
    ['umur' => 44, 'kategori' => 6],
    ['umur' => 47, 'kategori' => 7],
    ['umur' => 50, 'kategori' => 8],
    ['umur' => 53, 'kategori' => 9],
    ['umur' => 56, 'kategori' => 10],
];

foreach ($datas as $data) {
    test('Testing kategori ' . $data['kategori'], function () use ($data) {
        $umur = $data['umur'];

        $kategori = KategoriUmur::check($umur);

        expect($kategori)
            ->toBeInt()
            ->toBe($data['kategori']);
    });
}

test('Testing tidak ada kategori / dibawah ketentuan', function () {
    $umur = 17;

    $kategori = KategoriUmur::check($umur);

    expect($kategori)
        ->toBeInt()
        ->toBe(0);
});

test('Testing tidak ada kategori / diatas ketentuan', function () {
    $umur = 59;

    $kategori = KategoriUmur::check($umur);

    expect($kategori)
        ->toBeInt()
        ->toBe(0);
});
