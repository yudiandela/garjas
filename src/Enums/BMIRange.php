<?php declare(strict_types=1);

namespace Yudiandela\Garjas\Enums;

enum BMIRange: string {
    case LLB = '<= 19.5';
    case LB  = '19.6 - 20.3';
    case NB  = '20.4 - 21.1';
    case HB  = '21.2 - 22.4';
    case IB  = '22.5 - 23.7';
    case IA  = '23.8 - 25.0';
    case HA  = '25.1 - 26.2';
    case NA  = '26.3 - 27.1';
    case LA  = '27.2 - 28.2';
    case LLA = '>= 28.3';
}
