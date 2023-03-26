<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class CourseLevel extends Enum
{
    const LOW = 1; //Thấp
    const MEDIUM = 2; //Trung bình
    const HIGH = 3; //Cao

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
            case self::LOW:
                return 'Thấp';
                break;

            case self::MEDIUM:
                return 'Trung bình';
                break;

            case self::HIGH:
                return 'Cao';
                break;

            default:
                break;
        }
    }
}
