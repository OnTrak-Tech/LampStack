#!/bin/bash

# Update inventory.ini with your server IPs before running this script
ansible-playbook -i inventory.ini site.yml