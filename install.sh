#!/usr/bin/env bash

# Usage:
#   chmod +x install.sh
#   ./install.sh

# Created by: @apollo404

echo -e "\n\033[1;36mINSTALANDO O APACHE2 \033[1;33mAGUARDE...\033[0m"
apt-get install apache2 -y > /dev/null 2>&1
apt-get install php5 libapache2-mod-php5 php5-mcrypt -y > /dev/null 2>&1
service apache2 restart > /dev/null 2>&1
apt-get install php5-curl > /dev/null 2>&1
apt-get install php5 libapache2-mod-php5 php5-mcrypt -y > /dev/null 2>&1

echo -ne "\033[1;32m INFORME A MESMA SENHA\033[1;37m: "; read senha
cd ../var/www/html
echo "<?php \$pass='$senha'; ?>" > pass.php

curl -o online.php 'https://raw.githubusercontent.com/wellborgmann/checkuser2/main/online.php'
curl -o conexao.php 'https://raw.githubusercontent.com/wellborgmann/checkuser2/main/conexao.php'
