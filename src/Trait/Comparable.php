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

trait Comparable
{
    public function equals(self $enum): bool
    {
        if ($enum instanceof \BackedEnum) {
            return $enum->value === $this->value;
        }

        return $enum->name === $this->name;
    }

    public function notEquals(self $enum): bool
    {
        return !$this->equals($enum);
    }

    /**
     * @param self[] $enums
     */
    public function equalsOneOf(array $enums): bool
    {
        foreach ($enums as $value) {
            if ($this->equals($value)) {
                return true;
            }
        }

        return false;
    }

    public function notEqualsOneOf(array $enums): bool
    {
        return !$this->equalsOneOf($enums);
    }
}
