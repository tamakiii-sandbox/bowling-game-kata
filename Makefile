.PHONY: help install test mutation

help:
	@cat $(firstword $(MAKEFILE_LIST))

install:
	composer install

test:
	vendor/bin/phpunit --colors test

mutation:
	vendor/bin/infection --test-framework=phpunit --show-mutations
