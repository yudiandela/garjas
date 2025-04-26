<?php

use Yudiandela\Garjas\Perhitungan\BMI;

$datas = [
    [
        'berat_badan' => 1,
        'kategori' => 'LLB (Luar Limit Bawah)',
        'bmi' => '<= 19.5',
    ], [
        'berat_badan' => 45,
        'kategori' => 'LB (Limit Bawah)',
        'bmi' => '19.6 - 20.3',
    ], [
        'berat_badan' => 46,
        'kategori' => 'NB (Normal Bawah)',
        'bmi' => '20.4 - 21.1',
    ], [
        'berat_badan' => 48,
        'kategori' => 'HB (Harmonis Bawah)',
        'bmi' => '21.2 - 22.4',
    ], [
        'berat_badan' => 51,
        'kategori' => 'IB (Ideal Bawah)',
        'bmi' => '22.5 - 23.7',
    ], [
        'berat_badan' => 54,
        'kategori' => 'IA (Ideal Atas)',
        'bmi' => '23.8 - 25.0',
    ], [
        'berat_badan' => 57,
        'kategori' => 'HA (Harmonis Atas)',
        'bmi' => '25.1 - 26.2',
    ], [
        'berat_badan' => 60,
        'kategori' => 'NA (Normal Atas)',
        'bmi' => '26.3 - 27.1',
    ], [
        'berat_badan' => 62,
        'kategori' => 'LA (Limit Atas)',
        'bmi' => '27.2 - 28.2',
    ], [
        'berat_badan' => 64,
        'kategori' => 'LLA (Luar Limit Atas)',
        'bmi' => '>= 28.3',
    ],
];


foreach ($datas as $data) {
    test('Testing BMI ' . $data['kategori'], function () use ($data) {
        [$beratBadan, $tinggiBadan] = [$data['berat_badan'], 150];
        $bmi = BMI::check($beratBadan, $tinggiBadan);

        expect($bmi)
            ->toBeArray()
            ->toHaveKeys(['kategori', 'range_bmi', 'bmi']);
    });
}
