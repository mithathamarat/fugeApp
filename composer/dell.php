<?php
	session_start();
	function my_folder_delete($path) {
    if(!empty($path) && is_dir($path) ){
        $dir  = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS); //upper dirs are not included,otherwise DISASTER HAPPENS :)
        $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $f) {if (is_file($f)) {unlink($f);} else {$empty_dirs[] = $f;} } if (!empty($empty_dirs)) {foreach ($empty_dirs as $eachDir) {rmdir($eachDir);}} rmdir($path);
    }
}

my_folder_delete("../../$_SESSION[project]");
	
	unset($_SESSION['project']);
	
	if(session_destroy())
	{
		
		
		
		
		
		header("Location:../");
	}
?>