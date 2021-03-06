<?php

declare(strict_types=1);

namespace Meringue\FormattedInterval;

use Meringue\FormattedDateTime\SecondsSinceJanuary1st1970;
use Meringue\ISO8601Interval\WithFixedStartDateTime;

class TotalCeiledDays
{
    /**
     * @var WithFixedStartDateTime $interval
     */
    private $interval;

    public function __construct(WithFixedStartDateTime $interval)
    {
        $this->interval = $interval;
    }

    public function value(): int
    {
        return (int) ceil(((new SecondsSinceJanuary1st1970($this->interval->ends()))->value() - (new SecondsSinceJanuary1st1970($this->interval->starts()))->value()) / 60 / 60 / 24);
    }
}