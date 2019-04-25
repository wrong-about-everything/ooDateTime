<?php

declare(strict_types=1);

namespace Meringue\ISO8601DateTime;

use Meringue\ISO8601DateTime;
use DateTimeZone;
use DateTimeImmutable as PhpDateTime;

class InTimeZone extends ISO8601DateTime
{
    private $dateTime;
    private $timeZone;

    public function __construct(ISO8601DateTime $dateTime, TimeZone $timeZone)
    {
        $this->dateTime = $dateTime;
        $this->timeZone = $timeZone;
    }

    public function value(): string
    {
        return
            (new FromISO8601(
                (new PhpDateTime($this->dateTime->value()))
                    ->setTimezone(
                        new DateTimeZone($this->timeZone->value())
                    )
                        ->format('c')
            ))
                ->value();
    }
}
