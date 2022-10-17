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
use PHPUnit\Framework\TestCase;

final class ComparableTest extends TestCase
{
    /**
     * @test
     */
    public function equalsReturnsTrue(): void
    {
        $enum = Color::BLUE;

        self::assertTrue($enum->equals(Color::BLUE));
    }

    /**
     * @test
     */
    public function equalsReturnsFalse(): void
    {
        $enum = Color::BLUE;

        self::assertFalse($enum->equals(Color::RED));
    }

    /**
     * @test
     */
    public function equalsReturnsTrueForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertTrue($enum->equals(NonBackedEnum::FOO));
    }

    /**
     * @test
     */
    public function equalsReturnsFalseForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertFalse($enum->equals(NonBackedEnum::BAR));
    }
}
