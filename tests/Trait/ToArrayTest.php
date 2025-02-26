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

namespace OskarStark\Enum\Tests\Trait;

use OskarStark\Enum\Tests\Fixture\Color;
use OskarStark\Enum\Tests\Fixture\NonBackedEnum;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ToArrayTest extends TestCase
{
    #[Test]
    public function toArrayWithBackendEnumString(): void
    {
        self::assertSame(
            [
                'RED' => 'red',
                'BLUE' => 'blue',
            ],
            Color::toArray(),
        );
    }

    #[Test]
    public function toArrayWithNonBackendEnumString(): void
    {
        self::assertSame(
            [
                'FOO' => 'FOO',
                'BAR' => 'BAR',
            ],
            NonBackedEnum::toArray(),
        );
    }
}
