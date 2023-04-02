<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusPayment extends Enum
{
    const UNPAID = 0; //Chưa thanh toán
    const PAID = 1; //Đã thanh toán

    /**
     * @return string
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::UNPAID:
                return 'Chưa thanh toán';
                break;

            case self::PAID:
                return 'Đã thanh toán';
                break;

            default:
                break;
        }
    }
}
