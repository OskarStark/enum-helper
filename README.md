# enum-helper

This library provides helpers for several enum operations:
 * compare
 * to array

It also provides an abstract `EnumTestCase`.

[![CI][ci_badge]][ci_link]

## Installation

```
composer require oskarstark/enum-helper
```

## Usage

```php
<?php

declare(strict_types=1);

namespace App\Domain\Value\Name;

use OskarStark\Value\TrimmedNonEmptyString;

enum Color: string
{
    case RED = 'red';
    case BLUE = 'blue';
}
```

[ci_badge]: https://github.com/OskarStark/enum-helper/workflows/CI/badge.svg?branch=main
[ci_link]: https://github.com/OskarStark/enum-helper/actions?query=workflow:ci+branch:main
