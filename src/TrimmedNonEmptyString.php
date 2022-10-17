<?php

declare(strict_types=1);

/*
 * This file is part of oskarstark/trimmed-non-empty-string.
 *
 * (c) Oskar Stark <oskarstark@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OskarStark\Value;

use function Symfony\Component\String\u;
use Webmozart\Assert\Assert;

final class TrimmedNonEmptyString
{
    private string $value;

    /**
     * @throws \InvalidArgumentException
     */
    private function __construct(string $value, string $exceptionMessage)
    {
        $value = u($value)->trim()->toString();

        Assert::stringNotEmpty($value, $exceptionMessage);

        $this->value = $value;
    }

    public static function fromString(string $value, string $exceptionMessage = ''): self
    {
        return new self($value, $exceptionMessage);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
