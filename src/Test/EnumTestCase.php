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

namespace OskarStark\Enum\Test;

use OskarStark\Enum\Trait\Comparable;
use PHPUnit\Framework\TestCase;

abstract class EnumTestCase extends TestCase
{
    /**
     * @test
     */
    final public function numberOfValues(): void
    {
        $class = static::getClass();

        self::assertCount(
            static::getNumberOfValues(),
            $class::cases(),
        );
    }

    /**
     * @test
     */
    final public function equalsOneOf(): void
    {
        $class = static::getClass();

        if (!\in_array(Comparable::class, array_keys((new \ReflectionClass($class))->getTraits()), true)
            || 1 === (is_countable($class::cases()) ? \count($class::cases()) : 0)
        ) {
            self::assertTrue(true);

            return;
        }

        $allValues = $class::cases();

        $valueOne = current(\array_slice($allValues, 0, 1));
        $valueTwo = current(\array_slice($allValues, 1, 1));

        $values = [$valueOne, $valueTwo];

        shuffle($values);

        self::assertTrue($valueOne->equalsOneOf($values));

        $values = [$valueTwo];

        shuffle($values);

        self::assertFalse($valueOne->equalsOneOf($values));
    }

    /**
     * @test
     */
    final public function equals(): void
    {
        $class = static::getClass();

        if (!\in_array(Comparable::class, array_keys((new \ReflectionClass($class))->getTraits()), true)
            || 1 === (is_countable($class::cases()) ? \count($class::cases()) : 0)
        ) {
            self::assertTrue(true);

            return;
        }

        $allValues = $class::cases();

        $valueOne = current(\array_slice($allValues, 0, 1));
        $valueTwo = current(\array_slice($allValues, 1, 1));

        self::assertTrue($valueOne->equals($valueOne));
        self::assertFalse($valueOne->equals($valueTwo));
    }

    /**
     * @test
     */
    final public function notEquals(): void
    {
        $class = static::getClass();

        if (!\in_array(Comparable::class, array_keys((new \ReflectionClass($class))->getTraits()), true)
            || 1 === (is_countable($class::cases()) ? \count($class::cases()) : 0)
        ) {
            self::assertTrue(true);

            return;
        }

        $allValues = $class::cases();

        $valueOne = current(\array_slice($allValues, 0, 1));
        $valueTwo = current(\array_slice($allValues, 1, 1));

        self::assertFalse($valueOne->notEquals($valueOne));
        self::assertTrue($valueOne->notEquals($valueTwo));
    }

    /**
     * @phpstan-return class-string
     */
    abstract protected static function getClass(): string;

    abstract protected static function getNumberOfValues(): int;
}
