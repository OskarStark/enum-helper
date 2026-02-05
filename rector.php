<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Attribute\SortAttributeNamedArgsRector;
use Rector\CodeQuality\Rector\ClassMethod\LocallyCalledStaticMethodToNonStaticRector;
use Rector\CodeQuality\Rector\FuncCall\SimplifyRegexPatternRector;
use Rector\CodeQuality\Rector\FuncCall\SortCallLikeNamedArgsRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\MethodCall\RemoveNullArgOnNullDefaultParamRector;
use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector;
use Rector\PHPUnit\CodeQuality\Rector\Class_\PreferPHPUnitThisCallRector;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/rector.php',
        __DIR__.'/src',
        __DIR__.'/tests',
    ])
    ->withCache('.build/rector')
    ->withPhpVersion(PhpVersion::PHP_81)
    ->withImportNames(importShortClasses: false)
    ->withParallel()
    ->withPhpSets()
    ->withComposerBased(phpunit: true)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        earlyReturn: true,
        phpunitCodeQuality: true,
    )
    ->withSkip([
        SortAttributeNamedArgsRector::class,
        SortCallLikeNamedArgsRector::class,
        SimplifyRegexPatternRector::class, // Keep explicit regex patterns for better readability
        RemoveNullArgOnNullDefaultParamRector::class => [
            __DIR__.'/tests', // Keep explicit null arguments in tests for clarity
        ],
        LocallyCalledStaticMethodToNonStaticRector::class,
        PreferPHPUnitThisCallRector::class,
        NullToStrictStringFuncCallArgRector::class, // Avoid redundant casts when value is already a string
    ]);
