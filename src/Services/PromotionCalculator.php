<?php
declare(strict_types=1);

namespace App\Services;

/**
 * Class Calculator
 *
 * @package App\Services
 */
class PromotionCalculator
{
    public function calculateAfterPromotion(...$prices)
    {
        $start = 0;
        foreach ($prices as $price) {
            $start += $price;
        }

        return $start - ($start * $this->getPromotionPercentage() / 100);
    }

    public function getPromotionPercentage()
    {
        return (int) file_get_contents('file.txt');
    }
}
