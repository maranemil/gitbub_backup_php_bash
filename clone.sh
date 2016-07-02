#!/bin/bash

# PHPGames
# http://www.tldp.org/LDP/abs/html/abs-guide.html

# -----------------------------------
# set user name from git
# -----------------------------------
orgname="your_user_name"

# -----------------------------------
# get list of projects
# -----------------------------------
php -f get_git_list.php -- $orgname

# -----------------------------------
# clone projects
# -----------------------------------
while read F  ; do
        echo $F
	git clone $F
done <listprojects.txt

# -----------------------------------
# make zip of git projects
# -----------------------------------
for i in */; do zip -r "${i%/}.zip" "$i"; done
