.PHONY: help provision
.DEFAULT_GOAL := help

ANSIBLE_FOLDER=infra/ansible

BUCKET=gs://hqf-backups/hqfinder.com
LATEST_BACKUP_KEY=`gsutil ls $(BUCKET) | sort | tail -n 1`
DUMP_FILE=./latest_dump.sql.gz


help:
	@echo "provision, backup_files"

provision:
	cd $(ANSIBLE_FOLDER) && ansible-galaxy install -r requirements.yml -f && ansible-playbook -i hosts production.yml
