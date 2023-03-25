<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class FlashType extends Enum
{
    const Error = 'error';
    const Success = 'success';
    const Warning = 'warning';

    const OK = 200;
    const NOT_FOUND = 400;
}
