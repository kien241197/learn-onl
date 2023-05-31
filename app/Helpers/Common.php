<?php

namespace App\Helpers;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;


/**
 * Class Common
 *
 * @package App\Helpers
 */
class Common
{
    /**
     * @param string $text
     * @param int $fontSize
     * @param int $imgWidth
     * @param int $imgHeight
     * @return string|null
     */
    public static function getImageByString(string $text, int $fontSize = 20, int $imgWidth = 300, int $imgHeight = 50)
    {
        try {
            $fileName = trim(str_replace([' ', '.', ','], '', $text));
            $linkImage = 'storage/images/phone_' . $fileName . '.png';
            if (File::exists(public_path($linkImage))) {
                return $linkImage;
            }
            $font = public_path("fonts/OpenSans-Bold.ttf");
            //create the image
            $image = imagecreatetruecolor($imgWidth, $imgHeight);
            $textColor = imagecolorallocate($image, 255, 255, 255);
            $backgroundColor = imagecolorallocate($image, 16, 149, 71);
            imagefilledrectangle($image, 0, 0, $imgWidth - 1, $imgHeight - 1, $backgroundColor);
            //break lines
            $textBox = imagettfbbox($fontSize, 0, $font, $text);
            $textWidth = abs(max($textBox[2], $textBox[4]));
            $textHeight = abs(max($textBox[5], $textBox[7]));
            $x = (imagesx($image) - $textWidth) / 2;
            $y = ((imagesy($image) + $textHeight) / 2);
            //add the text
            imagettftext($image, $fontSize, 0, $x, $y, $textColor, $font, $text);
            imagepng($image, $linkImage);
            imagedestroy($image);

            return $linkImage;
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::error($e->getMessage());
        }
        return null;

    }
}
