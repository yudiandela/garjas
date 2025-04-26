<?php

use Yudiandela\Garjas\Perhitungan\SitUp;

$datas = [
    // Data Pria
    [ 'jenis_kelamin' => 'pria', 'umur' => 17, 'sit_up' => 30, 'nilai' => 0 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 18, 'sit_up' => 30, 'nilai' => 49 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 26, 'sit_up' => 30, 'nilai' => 54 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 31, 'sit_up' => 30, 'nilai' => 59 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 36, 'sit_up' => 30, 'nilai' => 64 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 41, 'sit_up' => 30, 'nilai' => 69 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 44, 'sit_up' => 30, 'nilai' => 74 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 47, 'sit_up' => 30, 'nilai' => 79 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 50, 'sit_up' => 30, 'nilai' => 84 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 53, 'sit_up' => 30, 'nilai' => 89 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 56, 'sit_up' => 30, 'nilai' => 94 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 59, 'sit_up' => 30, 'nilai' => 0 ],
    // Data Wanita
    [ 'jenis_kelamin' => 'wanita', 'umur' => 17, 'sit_up' => 30, 'nilai' => 0 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 18, 'sit_up' => 30, 'nilai' => 70 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 26, 'sit_up' => 30, 'nilai' => 75 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 31, 'sit_up' => 30, 'nilai' => 80 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 36, 'sit_up' => 30, 'nilai' => 85 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 41, 'sit_up' => 30, 'nilai' => 90 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 44, 'sit_up' => 30, 'nilai' => 95 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 47, 'sit_up' => 24, 'nilai' => 73 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 50, 'sit_up' => 24, 'nilai' => 78 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 53, 'sit_up' => 24, 'nilai' => 83 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 56, 'sit_up' => 24, 'nilai' => 88 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 59, 'sit_up' => 24, 'nilai' => 0 ],
];

foreach ($datas as $data) {
    test('Sit Up 1 Menit usia ' . $data['umur'] . ' ' . $data['jenis_kelamin'], function () use ($data) {
        $nilai = SitUp::check($data['umur'], $data['jenis_kelamin'], $data['sit_up']);

        expect($nilai)
            ->toBeArray()
            ->toHaveKeys(['sit_up_1_menit', 'nilai']);

        expect($nilai['nilai'])->toBe($data['nilai']);
    });
}
