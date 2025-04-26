<?php

use Yudiandela\Garjas\Perhitungan\Lari12Menit;
use Yudiandela\Garjas\Perhitungan\PullUp;
use Yudiandela\Garjas\Perhitungan\PushUp;
use Yudiandela\Garjas\Perhitungan\ShuttleRun;
use Yudiandela\Garjas\Perhitungan\SitUp;

$datas = [
    [ 'jenis_kelamin' => 'pria', 'umur' => 36, 'lari' => 2345, 'pull_up' => 11, 'sit_up' => 34, 'push_up' => 30, 'shuttle_run' => 18.00, 'nilai_akhir' => 65.5 ],
    [ 'jenis_kelamin' => 'wanita', 'umur' => 36, 'lari' => 2345, 'pull_up' => 36, 'sit_up' => 32, 'push_up' => 23, 'shuttle_run' => 22.00, 'nilai_akhir' => 84.75 ],
];

foreach ($datas as $data) {
    test('Hitung Total Nilai Garjas usia ' . $data['umur'] . ' ' . $data['jenis_kelamin'], function () use ($data) {

        $nilaiLari12Menit = Lari12Menit::check($data['umur'], $data['jenis_kelamin'], $data['lari']);
        $nilaiPullUp = PullUp::check($data['umur'], $data['jenis_kelamin'], $data['pull_up']);
        $nilaiSitUp = SitUp::check($data['umur'], $data['jenis_kelamin'], $data['sit_up']);
        $nilaiPushUp = PushUp::check($data['umur'], $data['jenis_kelamin'], $data['push_up']);
        $nilaiShuttleRun = ShuttleRun::check($data['umur'], $data['jenis_kelamin'], $data['shuttle_run']);

        $nilaiGarjasA = (float) $nilaiLari12Menit['nilai'];
        $nilaiGarjasB = (float) (($nilaiPullUp['nilai'] + $nilaiSitUp['nilai'] + $nilaiPushUp['nilai'] + $nilaiShuttleRun['nilai']) / 4);

        $totalNilai = (float) (($nilaiGarjasA + $nilaiGarjasB) / 2);

        expect($totalNilai)->toBe($data['nilai_akhir']);
    });
}
