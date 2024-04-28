.PHONY: help install test

help:
	@cat $(firstword $(MAKEFILE_LIST))

install:
	composer install

test:
	vendor/bin/phpunit --colors test
