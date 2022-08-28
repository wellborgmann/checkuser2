#!/usr/bin/env bash

# Usage:
#   chmod +x install.sh
#   ./install.sh

# Created by: @apollo404

echo -ne "\033[1;32m INFORME A MESMA SENHA\033[1;37m: "; read senha
cd ../var/www/html
echo "$senha" > pass.php

