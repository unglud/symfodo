<?php
declare(strict_types=1);

namespace App\Services;

use Psr\Log\LoggerInterface;

/**
 * Class GiftService
 *
 * @package App\Services
 */
class GiftService
{
    public array $gifts = ["flower", "car"];

    public function __construct(LoggerInterface $logger)
    {
        $logger->info('igft randomised');
        shuffle($this->gifts);
    }
}
