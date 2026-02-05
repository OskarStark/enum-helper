# vim: set tabstop=8 softtabstop=8 noexpandtab:
.PHONY: static-code-analysis
static-code-analysis: vendor ## Runs a static code analysis with phpstan/phpstan
	symfony php vendor/bin/phpstan analyse --configuration=phpstan.neon.dist --memory-limit=-1

.PHONY: static-code-analysis-baseline
static-code-analysis-baseline: vendor ## Generates a baseline for static code analysis with phpstan/phpstan
	symfony php vendor/bin/phpstan analyze --configuration=phpstan.neon.dist --generate-baseline=phpstan-baseline.neon --memory-limit=-1

.PHONY: cs
cs:
	symfony php vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php --diff --verbose

.PHONY: rector
rector:
	symfony php vendor/bin/rector

.PHONY: test
test:
	php vendor/bin/phpunit
