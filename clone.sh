#!/bin/bash

# -----------------------------------
# set user name from git
# -----------------------------------
orgname="usrname"

# -----------------------------------
# get list of projects from api.github.com
# -----------------------------------
php -f get_git_list.php -- $orgname

# -----------------------------------
# clone projects from listprojects.txt
# -----------------------------------
while read F  ; do
  	echo $F
  	sleep 2
	git clone $F
done < listprojects.txt

# -----------------------------------
# make zip of git projects cloned in current folder
# -----------------------------------
for i in */; do zip -r "${i%/}.zip" "$i"; done
