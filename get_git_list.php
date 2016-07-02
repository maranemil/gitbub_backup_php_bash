<?php
/**
 * Created by PhpStorm.
 * User: lime
 * Date: 02.07.16
 * Time: 23:13
 */


ini_set('error_reporting', 0);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

# Substitute variables here if needed
//$ORG_NAME = "PHPGames"; # <USER_NAME>
$ORG_NAME = $argv[1];
$GITHUB_INSTANCE = "api.github.com"; # <GITHUB INSTANCE>
$URL = "https://{$GITHUB_INSTANCE}/users/{$ORG_NAME}/repos";

# run curl in shell
$cmd = "curl -s {$URL}";
$resJson = shell_exec($cmd);
$resArGit = (array) json_decode($resJson,true);
//print "<pre>"; print_r($resArGit); die();

# generate file
//$fp = fopen("listprojects".date("YmdHis").".txt","w");
$fp = fopen("listprojects.txt","w");
fwrite($fp, "");

$fp = fopen("listprojects.txt","a");
foreach($resArGit as $repoGit){
    fwrite($fp, $repoGit["clone_url"]."\n");
}

/*
 $repoGit['id']
 "html_url": "https://github.com/your_user_name/AI",
 "url": "https://api.github.com/repos/your_user_name/AI",
 "git_url": "git://github.com/your_user_name/AI.git",
 "ssh_url": "git@github.com:your_user_name/AI.git",
 "clone_url": "https://github.com/your_user_name/AI.git",
 "svn_url": "https://github.com/your_user_name/AI",
 */
