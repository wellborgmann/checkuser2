#!/usr/bin/env bash

# Usage:
#   chmod +x install.sh
#   ./install.sh

# Created by: @DuTra01

echo -ne "\033[1;32m INFORME A MESMA SENHA\033[1;37m: "; read senha
//echo "<?php $pass=$senha;?>" > pass.php

sed -i "s;1010;$senha;g" /var/www/html/pass.php > /dev/null 2>&1
fi
sleep 1
