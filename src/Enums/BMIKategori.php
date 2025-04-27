<?php declare(strict_types=1);

namespace Yudiandela\Garjas\Enums;

enum BMIKategori: string {
    case LLB = 'LLB (Luar Limit Bawah)';
    case LB  = 'LB (Limit Bawah)';
    case NB  = 'NB (Normal Bawah)';
    case HB  = 'HB (Harmonis Bawah)';
    case IB  = 'IB (Ideal Bawah)';
    case IA  = 'IA (Ideal Atas)';
    case HA  = 'HA (Harmonis Atas)';
    case NA  = 'NA (Normal Atas)';
    case LA  = 'LA (Limit Atas)';
    case LLA = 'LLA (Luar Limit Atas)';
}
