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

namespace OskarStark\Enum\Tests\Fixture;

use OskarStark\Enum\Trait\Comparable;
use OskarStark\Enum\Trait\ToArray;

enum NonBackedEnum
{
    use Comparable;
    use ToArray;

    case FOO;
    case BAR;
}
