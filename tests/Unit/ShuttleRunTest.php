<?php

use Yudiandela\Garjas\Perhitungan\ShuttleRun;

$datas = [
    // Data Pria
    [ 'jenis_kelamin' => 'pria', 'umur' => 17, 'shuttle_run' => 22.00, 'nilai' => 0 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 18, 'shuttle_run' => 22.00, 'nilai' => 39 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 26, 'shuttle_run' => 22.00, 'nilai' => 44 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 31, 'shuttle_run' => 22.00, 'nilai' => 49 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 36, 'shuttle_run' => 22.00, 'nilai' => 54 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 41, 'shuttle_run' => 22.00, 'nilai' => 59 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 44, 'shuttle_run' => 22.00, 'nilai' => 64 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 47, 'shuttle_run' => 22.00, 'nilai' => 69 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 50, 'shuttle_run' => 22.00, 'nilai' => 74 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 53, 'shuttle_run' => 22.00, 'nilai' => 79 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 56, 'shuttle_run' => 22.00, 'nilai' => 84 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 59, 'shuttle_run' => 22.00, 'nilai' => 0 ],
    // Data Wanita
    [ 'jenis_kelamin' => 'wanita', 'umur' => 17, 'shuttle_run' => 22.00, 'nilai' => 0 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 18, 'shuttle_run' => 22.00, 'nilai' => 52 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 26, 'shuttle_run' => 22.00, 'nilai' => 57 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 31, 'shuttle_run' => 22.00, 'nilai' => 62 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 36, 'shuttle_run' => 22.00, 'nilai' => 67 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 41, 'shuttle_run' => 22.00, 'nilai' => 72 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 44, 'shuttle_run' => 22.00, 'nilai' => 77 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 47, 'shuttle_run' => 22.00, 'nilai' => 82 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 50, 'shuttle_run' => 22.00, 'nilai' => 87 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 53, 'shuttle_run' => 22.00, 'nilai' => 92 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 56, 'shuttle_run' => 22.00, 'nilai' => 97 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 59, 'shuttle_run' => 22.00, 'nilai' => 0 ],
];

foreach ($datas as $data) {
    test('Shuttle Run usia ' . $data['umur'] . ' ' . $data['jenis_kelamin'], function () use ($data) {
        $nilai = ShuttleRun::check($data['umur'], $data['jenis_kelamin'], $data['shuttle_run']);

        expect($nilai)
            ->toBeArray()
            ->toHaveKeys(['shuttle_run', 'nilai']);

        expect($nilai['nilai'])->toBe($data['nilai']);
    });
}
