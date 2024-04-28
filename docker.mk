.PHONY: help build build clean bash

IMAGE := tamakiii-sandbox/bowling-game-kata

help:
	@cat $(firstword $(MAKEFILE_LIST))

build:
	docker build -t $(IMAGE) .

clean:
	docker image rm $(IMAGE)

bash:
	docker run -it --rm -v $(PWD):/opt/bowling-game-kata -w /opt/bowling-game-kata $(IMAGE) $@
