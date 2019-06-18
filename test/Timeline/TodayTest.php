<?php

namespace Meringue\Tests\Timeline;

use DateTimeImmutable;
use Meringue\ISO8601DateTime\FromCustomFormat;
use Meringue\Timeline\Point\Today;
use PHPUnit\Framework\TestCase;

class TodayTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(
            (new Today())->value(),
            (new FromCustomFormat(
                'd.m.Y H:i:s',
                (new DateTimeImmutable('now'))
                    ->format('d.m.Y 00:00:00')
            ))
                ->value()
        );
    }
}
