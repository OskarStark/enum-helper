<?php

declare(strict_types=1);

$header = <<<'HEADER'
This file is part of oskarstark/enum-helper.

(c) Oskar Stark <oskarstark@googlemail.com>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
HEADER;

use Ergebnis\PhpCsFixer\Config;

$ruleSet = Config\RuleSet\Php81::create()
    ->withHeader($header)
    ->withRules(Config\Rules::fromArray([
        'blank_line_before_statement' => [
            'statements' => [
                'break',
                'continue',
                'declare',
                'default',
                'do',
                'exit',
                'for',
                'foreach',
                'goto',
                'if',
                'include',
                'include_once',
                'require',
                'require_once',
                'return',
                'switch',
                'throw',
                'try',
                'while',
            ],
        ],
        'concat_space' => [
            'spacing' => 'none',
        ],
        'date_time_immutable' => false,
        'error_suppression' => false,
        'final_class' => false,
        'mb_str_functions' => false,
        'native_function_invocation' => [
            'exclude' => [],
            'include' => [
                '@compiler_optimized',
            ],
            'scope' => 'all',
            'strict' => false,
        ],
        'attribute_empty_parentheses' => [
            'use_parentheses' => false,
        ],
        'php_unit_internal_class' => false,
        'php_unit_test_class_requires_covers' => false,
        'phpdoc_list_type' => false,
    ]));

$config = Config\Factory::fromRuleSet($ruleSet);

$config->getFinder()
    ->in('src')
    ->in('tests');

return $config;
