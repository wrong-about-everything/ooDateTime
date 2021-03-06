<?php

declare(strict_types=1);

namespace Meringue\FormattedDateTime;

use Meringue\ISO8601DateTime;
use DateTimeImmutable as PHPDateTime;

class ISO8601Formatted
{
    private $dt;
    private $format;

    public function __construct(ISO8601DateTime $dateTime, string $format)
    {
        $this->dt = $dateTime;
        $this->format = $format;
    }

    public function value(): string
    {
        return (new PHPDateTime($this->dt->value()))->format($this->format);
    }
}