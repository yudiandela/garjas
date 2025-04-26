<?php

use Yudiandela\Garjas\Perhitungan\Lari12Menit;

$datas = [
    // Data Pria
    [ 'jenis_kelamin' => 'pria', 'umur' => 17, 'lari' => 2345, 'nilai' => 0 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 18, 'lari' => 2345, 'nilai' => 38 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 26, 'lari' => 2345, 'nilai' => 43 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 31, 'lari' => 2345, 'nilai' => 48 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 36, 'lari' => 2345, 'nilai' => 53 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 41, 'lari' => 2345, 'nilai' => 58 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 44, 'lari' => 2345, 'nilai' => 63 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 47, 'lari' => 2345, 'nilai' => 68 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 50, 'lari' => 2345, 'nilai' => 73 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 53, 'lari' => 2345, 'nilai' => 78 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 56, 'lari' => 2345, 'nilai' => 83 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 59, 'lari' => 2345, 'nilai' => 0 ],
    // Data Wanita
    [ 'jenis_kelamin' => 'wanita', 'umur' => 17, 'lari' => 2145, 'nilai' => 0 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 18, 'lari' => 2145, 'nilai' => 55 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 26, 'lari' => 2145, 'nilai' => 60 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 31, 'lari' => 2145, 'nilai' => 65 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 36, 'lari' => 2145, 'nilai' => 70 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 41, 'lari' => 2145, 'nilai' => 75 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 44, 'lari' => 2145, 'nilai' => 80 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 47, 'lari' => 2145, 'nilai' => 85 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 50, 'lari' => 2145, 'nilai' => 90 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 53, 'lari' => 2145, 'nilai' => 95 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 56, 'lari' => 2145, 'nilai' => 100 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 59, 'lari' => 2145, 'nilai' => 0 ],
];

foreach ($datas as $data) {
    test('Lari 12 Menit usia ' . $data['umur'] . ' ' . $data['jenis_kelamin'], function () use ($data) {
        $nilai = Lari12Menit::check($data['umur'], $data['jenis_kelamin'], $data['lari']);

        expect($nilai)
            ->toBeArray()
            ->toHaveKeys(['lari_12_menit', 'nilai']);

        expect($nilai['nilai'])->toBe($data['nilai']);
    });
}
