<?php

declare(strict_types=1);

/**
 * This file is part of oskarstark/enum-helper.
 *
 * (c) Oskar Stark <oskarstark@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OskarStark\Enum\Tests\Test;

use OskarStark\Enum\Test\EnumTestCase;
use OskarStark\Enum\Tests\Fixture\Color;

final class EnumTestCaseTest extends EnumTestCase
{
    protected static function getClass(): string
    {
        return Color::class;
    }

    protected static function getNumberOfValues(): int
    {
        return 2;
    }
}
