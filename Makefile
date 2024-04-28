.PHONY: help install test mutation

NPROC ?= $(shell nproc)

help:
	@cat $(firstword $(MAKEFILE_LIST))

install:
	composer install

test:
	vendor/bin/phpunit --colors test

mutation:
	vendor/bin/infection --test-framework=phpunit --show-mutations --min-msi=100 --threads=$(NPROC)
