#!/usr/bin/env bash

# Usage:
#   chmod +x install.sh
#   ./install.sh

# Created by: @DuTra01

echo -ne "\033[1;32m INFORME A MESMA SENHA\033[1;37m: "; read senha

echo "$senha" > /var/www/html/pass.php

