# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

### Testing
- Run all tests: `vendor/bin/phpunit`
- Run a specific test file: `vendor/bin/phpunit tests/Path/To/TestFile.php`
- Run a specific test method: `vendor/bin/phpunit --filter testMethodName`

### Code Quality
- Run PHP-CS-Fixer: `vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php --diff --verbose`
  - Note: In CI, PHP-CS-Fixer runs without the `--config` flag as it auto-detects the config file
- Run PHPStan analysis: `vendor/bin/phpstan analyse --configuration=phpstan.neon.dist`
- Generate PHPStan baseline: `vendor/bin/phpstan analyze --configuration=phpstan.neon.dist --generate-baseline=phpstan-baseline.neon`

## Architecture Overview

This is a PHP library that provides enum helpers and traits for PHP 8.1+ applications. The library is organized as follows:

### Core Components

1. **Traits** (`src/Trait/`)
   - `Comparable`: Provides enum comparison methods (`equals()`, `notEquals()`, `equalsOneOf()`, `notEqualsOneOf()`)
   - `ToArray`: Converts enum cases to arrays, handling both backed and non-backed enums

2. **Testing Utilities** (`src/Test/`)
   - `EnumTestCase`: Abstract test case for testing enums, providing standard assertions for enum behavior

### Key Design Decisions

- Uses PHP 8.1+ enum features and requires minimum PHP 8.1
- Traits are designed to work with both `BackedEnum` and regular PHP enums
- The `Comparable` trait checks if an enum is backed and compares by value, otherwise compares by name
- The `ToArray` trait returns associative arrays with case names as keys
- All code follows Ergebnis PHP-CS-Fixer ruleset with custom configurations

### Testing Approach

- PHPUnit 10+ is used for testing
- Tests are located in `tests/` with fixtures in `tests/Fixture/`
- The abstract `EnumTestCase` provides standard enum tests that can be extended
  - When extending `EnumTestCase`, implement `getClass()` to return the FQCN of the enum being tested
  - Implement `getNumberOfValues()` to return the expected number of enum cases
  - The test case automatically tests `equals()`, `notEquals()`, `equalsOneOf()`, and case count if `Comparable` trait is used
- Tests use PHPUnit attributes (`#[Test]`) instead of annotations

### CI/CD

GitHub Actions workflow runs:
1. Coding standards check (PHP-CS-Fixer) on PHP 8.1 and 8.2
2. Static analysis (PHPStan at max level) on PHP 8.1 and 8.2
3. Tests on PHP 8.1 and 8.2 with both lowest and highest dependency versions (4 test matrix combinations per PHP version)
