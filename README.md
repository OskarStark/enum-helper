# trimmed-non-empty-string

This library provides a value object which ensures a trimmed non empty string.

[![CI][ci_badge]][ci_link]

## Installation

```
composer require oskarstark/trimmed-non-empty-string
```

## Usage

```php
<?php

declare(strict_types=1);

namespace App\Domain\Value\Name;

use OskarStark\Value\TrimmedNonEmptyString;

final class Name
{
    private string $value;

    private function __construct(string $value
   ) {
        $this->value = TrimmedNonEmptyString::fromString($value)->toString();
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
```

[ci_badge]: https://github.com/OskarStark/trimmed-non-empty-string/workflows/CI/badge.svg?branch=main
[ci_link]: https://github.com/OskarStark/trimmed-non-empty-string/actions?query=workflow:ci+branch:main
