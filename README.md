# KESEGARAN JASMANI MILITER

[![Latest Stable Version](https://img.shields.io/packagist/v/yudiandela/garjas.svg?style=flat-square)](https://packagist.org/packages/yudiandela/garjas)
[![Total Downloads](https://img.shields.io/packagist/dt/yudiandela/garjas.svg?style=flat-square)](https://packagist.org/packages/yudiandela/garjas)
[![License](https://img.shields.io/packagist/l/yudiandela/garjas.svg?style=flat-square)](https://packagist.org/packages/yudiandela/garjas)


Kesegaran Jasmani Militer (atau yang juga dikenal sebagai Garjas) adalah sebuah tes yang digunakan untuk mengukur tingkat kebugaran fisik prajurit TNI. Tes ini bertujuan untuk memastikan prajurit memiliki kemampuan fisik yang memadai untuk menjalankan tugas-tugas militer, seperti tes samapta A (lari 12 menit) dan tes samapta B (pull-up, sit-up, push-up, dan shuttle run).

Kegiatan Kesegaran Jasmani Militer dilaksanakan secara Periodik setiap tahun, untuk hal tersebut saya membuat Library PHP ini agar mudah di gunakan untuk pengembangan - pengembangan selanjutnya.

## Instalasi Paket

```php
composer require yudiandela/garjas
```

## Penggunaan

#### Pengecekan Body Mass Index (BMI)

```php
<?php

use Yudiandela\Garjas\Perhitungan\BMI;

[$beratBadan, $tinggiBadan] = [50, 150];
$bmi = BMI::check($beratBadan, $tinggiBadan);
```

Hasil yang di dapatkan

```php
[
    'kategori' => 'HB (Harmonis Bawah)',
    'range_bmi' => '21.2 - 22.4',
    'bmi' => 22.22
]
```

#### Pengecekan Kategori Umur

```php
<?php

use Yudiandela\Garjas\Perhitungan\KategoriUmur;

$umur = 36;
$kategori = KategoriUmur::check($umur);
```

Hasil yang di dapatkan

```php
4
```

#### Pengecekan Lari 12 Menit Sesuai Kategori

```php
<?php

use Yudiandela\Garjas\Perhitungan\Lari12Menit;

$data = [
    'jenis_kelamin' => 'pria',
    'umur' => 36,
    'lari' => 2345
];
$nilai = Lari12Menit::check($data['umur'], $data['jenis_kelamin'], $data['lari']);
```

Hasil yang di dapatkan

```php
[
    'lari_12_menit' => 2345.0,
    'nilai' => 53
]
```

#### Pengecekan Pull Up 1 Menit Sesuai Kategori

```php
<?php

use Yudiandela\Garjas\Perhitungan\PullUp;

$data = [
    'jenis_kelamin' => 'pria',
    'umur' => 36,
    'pull_up' => 9
];
$nilai = PullUp::check($data['umur'], $data['jenis_kelamin'], $data['pull_up']);
```

Hasil yang di dapatkan

```php
[
    'pull_up_1_menit' => 9.0,
    'nilai' => 70
]
```

#### Pengecekan Sit Up 1 Menit Sesuai Kategori

```php
<?php

use Yudiandela\Garjas\Perhitungan\SitUp;

$data = [
    'jenis_kelamin' => 'pria',
    'umur' => 36,
    'sit_up' => 30,
];
$nilai = SitUp::check($data['umur'], $data['jenis_kelamin'], $data['sit_up']);
```

Hasil yang di dapatkan

```php
[
    'sit_up_1_menit' => 30.0,
    'nilai' => 64
]
```

#### Pengecekan Push Up 1 Menit Sesuai Kategori

```php
<?php

use Yudiandela\Garjas\Perhitungan\PushUp;

$data = [
    'jenis_kelamin' => 'pria',
    'umur' => 36,
    'push_up' => 18
];
$nilai = PushUp::check($data['umur'], $data['jenis_kelamin'], $data['push_up']);
```

Hasil yang di dapatkan

```php
[
    'push_up_1_menit' => 18.0,
    'nilai' => 22
]
```

#### Pengecekan Shuttle Run Sesuai Kategori

```php
<?php

use Yudiandela\Garjas\Perhitungan\ShuttleRun;

$data = [
    'jenis_kelamin' => 'pria',
    'umur' => 36,
    'shuttle_run' => 22.00
];
$nilai = ShuttleRun::check($data['umur'], $data['jenis_kelamin'], $data['shuttle_run']);
```

Hasil yang di dapatkan

```php
[
    'shuttle_run' => 22.0,
    'nilai' => 54
]
```

## Pengembangan

#### Jalankan Test

```php
composer test
```
