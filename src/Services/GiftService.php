<?php
declare(strict_types=1);

namespace App\Services;

/**
 * Class GiftService
 *
 * @package App\Services
 */
class GiftService
{
    public array $gifts = ["flower", "car"];

    public function __construct()
    {
        shuffle($this->gifts);
    }
}
