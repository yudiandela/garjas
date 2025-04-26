<?php

use Yudiandela\Garjas\Perhitungan\PullUp;

$datas = [
    // Data Pria
    [ 'jenis_kelamin' => 'pria', 'umur' => 17, 'pull_up' => 9, 'nilai' => 0 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 18, 'pull_up' => 9, 'nilai' => 55 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 26, 'pull_up' => 9, 'nilai' => 60 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 31, 'pull_up' => 9, 'nilai' => 65 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 36, 'pull_up' => 9, 'nilai' => 70 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 41, 'pull_up' => 9, 'nilai' => 75 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 44, 'pull_up' => 9, 'nilai' => 80 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 47, 'pull_up' => 9, 'nilai' => 85 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 50, 'pull_up' => 9, 'nilai' => 90 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 53, 'pull_up' => 9, 'nilai' => 95 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 56, 'pull_up' => 9, 'nilai' => 100 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 59, 'pull_up' => 9, 'nilai' => 0 ],
    // Data Wanita
    [ 'jenis_kelamin' => 'wanita', 'umur' => 17, 'pull_up' => 23, 'nilai' => 0 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 18, 'pull_up' => 23, 'nilai' => 24 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 26, 'pull_up' => 23, 'nilai' => 29 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 31, 'pull_up' => 23, 'nilai' => 34 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 36, 'pull_up' => 23, 'nilai' => 39 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 41, 'pull_up' => 23, 'nilai' => 44 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 44, 'pull_up' => 23, 'nilai' => 49 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 47, 'pull_up' => 23, 'nilai' => 54 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 50, 'pull_up' => 23, 'nilai' => 59 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 53, 'pull_up' => 23, 'nilai' => 64 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 56, 'pull_up' => 23, 'nilai' => 69 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 59, 'pull_up' => 23, 'nilai' => 0 ],
];

foreach ($datas as $data) {
    test('Pull Up 1 Menit usia ' . $data['umur'] . ' ' . $data['jenis_kelamin'], function () use ($data) {
        $nilai = PullUp::check($data['umur'], $data['jenis_kelamin'], $data['pull_up']);

        expect($nilai)
            ->toBeArray()
            ->toHaveKeys(['pull_up_1_menit', 'nilai']);

        expect($nilai['nilai'])->toBe($data['nilai']);
    });
}
