<?php

use Yudiandela\Garjas\Perhitungan\PushUp;

$datas = [
    // Data Pria
    [ 'jenis_kelamin' => 'pria', 'umur' => 17, 'push_up' => 18, 'nilai' => 0 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 18, 'push_up' => 18, 'nilai' => 7 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 26, 'push_up' => 18, 'nilai' => 12 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 31, 'push_up' => 18, 'nilai' => 17 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 36, 'push_up' => 18, 'nilai' => 22 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 41, 'push_up' => 18, 'nilai' => 27 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 44, 'push_up' => 18, 'nilai' => 32 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 47, 'push_up' => 18, 'nilai' => 37 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 50, 'push_up' => 18, 'nilai' => 42 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 53, 'push_up' => 18, 'nilai' => 47 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 56, 'push_up' => 18, 'nilai' => 52 ],
    [ 'jenis_kelamin' => 'pria', 'umur' => 59, 'push_up' => 18, 'nilai' => 0 ],
    // Data Wanita
    [ 'jenis_kelamin' => 'wanita', 'umur' => 17, 'push_up' => 18, 'nilai' => 0 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 18, 'push_up' => 18, 'nilai' => 51 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 26, 'push_up' => 18, 'nilai' => 56 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 31, 'push_up' => 18, 'nilai' => 61 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 36, 'push_up' => 18, 'nilai' => 66 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 41, 'push_up' => 18, 'nilai' => 71 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 44, 'push_up' => 18, 'nilai' => 76 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 47, 'push_up' => 18, 'nilai' => 81 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 50, 'push_up' => 18, 'nilai' => 86 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 53, 'push_up' => 18, 'nilai' => 91 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 56, 'push_up' => 18, 'nilai' => 96 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 59, 'push_up' => 18, 'nilai' => 0 ],
];

foreach ($datas as $data) {
    test('Push Up 1 Menit usia ' . $data['umur'] . ' ' . $data['jenis_kelamin'], function () use ($data) {
        $nilai = PushUp::check($data['umur'], $data['jenis_kelamin'], $data['push_up']);

        expect($nilai)
            ->toBeArray()
            ->toHaveKeys(['push_up_1_menit', 'nilai']);

        expect($nilai['nilai'])->toBe($data['nilai']);
    });
}
