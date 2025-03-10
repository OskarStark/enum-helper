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

For example, you have the following Enum:

```php
<?php

declare(strict_types=1);

namespace App\Enum;

enum Color: string
{
    case RED = 'red';
    case BLUE = 'blue';
}
```

You can use the following traits:

```diff
<?php

declare(strict_types=1);

namespace App\Enum;

+use OskarStark\Enum\Trait\Comparable;
+use OskarStark\Enum\Trait\ToArray;

enum Color: string
{
+   use Comparable;
+   use ToArray;

    case RED = 'red';
    case BLUE = 'blue';
}
```

### `Comparable` Trait

This `trait` gives you the possibility to compare your `enum` with another one or a collection of enums like the
following:

```php
App\Enum\Color::RED->equals(App\Enum\Color::BLUE); // returns false
```

```php
App\Enum\Color::RED->notEquals(App\Enum\Color::RED); // returns false
```

```php
App\Enum\Color::RED->equalsOneOf([
    App\Enum\Color::BLUE,
    App\Enum\Color::RED,
]); // returns true
```

For example, you want to check if a color is a nice color:

```php
<?php

declare(strict_types=1);

namespace App\Enum;

use OskarStark\Enum\Trait\Comparable;
use OskarStark\Enum\Trait\ToArray;

enum Color: string
{
    use Comparable;
    use ToArray;

    case RED = 'red';
    case BLUE = 'blue';
    case GREEN = 'green';
    
    public function isNice(): bool
    {
        return self::equalsOneOf([
            self::BLUE,
            self::GREEN
        ]);
    }
}
```

```php
App\Enum\Color::RED->isNice(); // returns false
App\Enum\Color::BLUE->isNice(); // returns true
```

### `ToArray` Trait

This `trait` gives you the possibility to get an enum as array like the following:

#### For Backed Enum

```php
App\Enum\Color::toArray(); // returns ['RED' => 'red', 'BLUE' => 'blue']
```

#### For Non-Backed Enum
```php
App\Enum\NonBackedEnum::toArray(); // returns ['RED' => 'RED', 'BLUE' => 'BLUE']
```

[ci_badge]: https://github.com/OskarStark/enum-helper/workflows/CI/badge.svg?branch=main
[ci_link]: https://github.com/OskarStark/enum-helper/actions?query=workflow:ci+branch:main
