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

# generate empty text file
$fp = fopen("listprojects.txt","w");
fwrite($fp, "");

/*
https://developer.github.com/v3/#pagination
*/

# Substitute variables here if needed
$ORG_NAME = $argv[1]; // get username as argument
$intPages = 8; // 8 x 50 = 400 max repos
$GITHUB_INSTANCE = "api.github.com"; # <GITHUB INSTANCE>

for($intLoop = 0; $intLoop <=$intPages; $intLoop++) {

	$URL = "https://{$GITHUB_INSTANCE}/users/{$ORG_NAME}/repos?page=".$intLoop."&per_page=50";
	echo $URL.PHP_EOL;

	# run curl in shell
	$cmd = "curl -s {$URL}";
	$resJson = shell_exec($cmd);
	$resArGit = (array) json_decode($resJson,true);
	
	// append in file when repo found
	$fp = fopen("listprojects.txt","a");
	foreach($resArGit as $repoGit){
		
		echo $repoGit["clone_url"].PHP_EOL;
	
		$arGitPath = explode("/",$repoGit["clone_url"]);
		$strGitDirName = $arGitPath[count($arGitPath)-1];
		$strGitDirName = str_replace(".git","",$strGitDirName);
		
		if(!is_file($strGitDirName.".zip")){
			fwrite($fp, $repoGit["clone_url"]."\n");
		}
    
	}
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
