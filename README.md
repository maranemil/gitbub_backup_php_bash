# github_backup_php_bash
- GitHub Backup script for User Repos
- Max Repos read from Github 8 pages x 50 items = 400 

#### step1: add your username in clone.sh as github_name
* installation

```sh
git clone https://github.com/maranemil/gitbub_backup_php_bash.git
cd gitbub_backup_php_bash
gedit clone.sh
```
* change this line and add your username
```sh
github_name="your_user_name" 
```

#### step2 usage
* run in terminal
```sh
bash clone.sh
```
