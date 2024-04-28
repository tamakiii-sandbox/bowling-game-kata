.PHONY: help test

help:
	@cat $(firstword $(MAKEFILE_LIST))

test:
	vendor/bin/phpunit --colors test
