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

namespace OskarStark\Enum\Trait;

trait ToArray
{
    /**
     * @return array<string, int|string>
     *
     * @phpstan-return ($this is \BackedEnum ? array<string, string|int> : array<string, string>)
     */
    public static function toArray(): array
    {
        $choices = [];

        foreach (self::cases() as $case) {
            if ($case instanceof \BackedEnum) {
                $choices[$case->name] = $case->value;

                continue;
            }
            $choices[$case->name] = $case->name;
        }

        return $choices;
    }
}
