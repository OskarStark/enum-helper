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

final class ComparableTest extends TestCase
{
    #[Test]
    public function notEqualsReturnsTrue(): void
    {
        $enum = Color::BLUE;

        self::assertTrue($enum->notEquals(Color::RED));
    }

    #[Test]
    public function notEqualsReturnsFalse(): void
    {
        $enum = Color::BLUE;

        self::assertFalse($enum->notEquals(Color::BLUE));
    }

    #[Test]
    public function notEqualsReturnsTrueForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertTrue($enum->notEquals(NonBackedEnum::BAR));
    }

    #[Test]
    public function notEqualsReturnsFalseForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertFalse($enum->notEquals(NonBackedEnum::FOO));
    }

    #[Test]
    public function equalsReturnsTrue(): void
    {
        $enum = Color::BLUE;

        self::assertTrue($enum->equals(Color::BLUE));
    }

    #[Test]
    public function equalsReturnsFalse(): void
    {
        $enum = Color::BLUE;

        self::assertFalse($enum->equals(Color::RED));
    }

    #[Test]
    public function equalsReturnsTrueForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertTrue($enum->equals(NonBackedEnum::FOO));
    }

    #[Test]
    public function equalsReturnsFalseForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertFalse($enum->equals(NonBackedEnum::BAR));
    }

    #[Test]
    public function equalsOneOfReturnsTrue(): void
    {
        $enum = Color::BLUE;

        self::assertTrue($enum->equalsOneOf([
            Color::BLUE,
            Color::RED,
        ]));
    }

    #[Test]
    public function equalsOneOfReturnsFalse(): void
    {
        $enum = Color::BLUE;

        self::assertFalse($enum->equalsOneOf([
            Color::RED,
        ]));
    }

    #[Test]
    public function equalsOneOfReturnsTrueForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertTrue($enum->equalsOneOf([
            NonBackedEnum::FOO,
            NonBackedEnum::BAR,
        ]));
    }

    #[Test]
    public function equalsOneOfReturnsFalseForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertFalse($enum->equalsOneOf([
            NonBackedEnum::BAR,
        ]));
    }

    #[Test]
    public function notEqualsOneOfReturnsTrue(): void
    {
        $enum = Color::BLUE;

        self::assertTrue($enum->notEqualsOneOf([
            Color::RED,
        ]));
    }

    #[Test]
    public function notEqualsOneOfReturnsFalse(): void
    {
        $enum = Color::BLUE;

        self::assertFalse($enum->notEqualsOneOf([
            Color::RED,
            Color::BLUE,
        ]));
    }

    #[Test]
    public function notEqualsOneOfReturnsFalseForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertFalse($enum->notEqualsOneOf([
            NonBackedEnum::FOO,
            NonBackedEnum::BAR,
        ]));
    }

    #[Test]
    public function notEqualsOneOfReturnsTrueForNonBackedEnum(): void
    {
        $enum = NonBackedEnum::FOO;

        self::assertTrue($enum->notEqualsOneOf([
            NonBackedEnum::BAR,
        ]));
    }
}
