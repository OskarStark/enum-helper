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
    public function notEqualsReturnsTrue(): void
    {
        $enum = Color::BLUE;

        self::assertTrue($enum->notEquals(Color::RED));
    }

    /**
     * @test
     */
    public function notEqualsReturnsFalse(): void
    {
        $enum = Color::BLUE;

        self::assertFalse($enum->notEquals(Color::BLUE));
    }

    /**
     * @test
     */
    public function notEqualsReturnsTrueForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertTrue($enum->notEquals(NonBackedEnum::BAR));
    }

    /**
     * @test
     */
    public function notEqualsReturnsFalseForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertFalse($enum->notEquals(NonBackedEnum::FOO));
    }

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

    /**
     * @test
     */
    public function equalsOneOfReturnsTrue(): void
    {
        $enum = Color::BLUE;

        self::assertTrue($enum->equalsOneOf([
            Color::BLUE,
            Color::RED,
        ]));
    }

    /**
     * @test
     */
    public function equalsOneOfReturnsFalse(): void
    {
        $enum = Color::BLUE;

        self::assertFalse($enum->equalsOneOf([
            Color::RED,
        ]));
    }

    /**
     * @test
     */
    public function equalsOneOfReturnsTrueForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertTrue($enum->equalsOneOf([
            NonBackedEnum::FOO,
            NonBackedEnum::BAR,
        ]));
    }

    /**
     * @test
     */
    public function equalsOneOfReturnsFalseForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertFalse($enum->equalsOneOf([
            NonBackedEnum::BAR,
        ]));
    }
}
