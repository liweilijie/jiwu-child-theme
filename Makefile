# Makefile for deploying houzez-child
USER := bst
HOST := 192.168.1.253
REMOTE_DIR := /home/bst/houzez-child

RSYNC := rsync -avz --delete ./ $(USER)@$(HOST):$(REMOTE_DIR)/

.PHONY: upload

upload:
	@echo "rsync to bst host..."
	$(RSYNC)