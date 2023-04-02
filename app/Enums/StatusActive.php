<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusActive extends Enum
{
    const NOT = 0; //Chưa kích hoạt
    const ACTIVE = 1; //Đã kích hoạt

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
            case self::NOT:
                return 'Chưa kích hoạt';
                break;

            case self::ACTIVE:
                return 'Đã kích hoạt';
                break;

            default:
                break;
        }
    }
}
