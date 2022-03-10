#!/bin/bash

# -----------------------------------
# set user name from git
# -----------------------------------
github_name="user_name"

# -----------------------------------
# get list of projects from api.github.com
# -----------------------------------
php -f get_git_list.php -- $github_name

# -----------------------------------
# clone projects from list_projects.txt
# -----------------------------------
# shellcheck disable=SC2162
while read F  ; do
  	# shellcheck disable=SC2086
  	echo $F
  	sleep 2
	# shellcheck disable=SC2086
	git clone $F
done < list_projects.txt

# -----------------------------------
# make zip of git projects cloned in current folder
# -----------------------------------
for i in */; do zip -r "${i%/}.zip" "$i"; done
