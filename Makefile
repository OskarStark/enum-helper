# vim: set tabstop=8 softtabstop=8 noexpandtab:
phpstan:
	docker run --rm -it -w=/app -v ${PWD}:/app oskarstark/phpstan-ga:0.12.81 analyse src/ --level=7

cs:
	symfony php vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php --diff --verbose

test:
	php vendor/bin/phpunit -v
