<?php  
// session_cache_limiter('public');
// session_cache_limiter('nocache');
// header("Pragma: public");//this caused problems: manifest was being cached
// header("Cache-Control: public, max-age=6000");//this caused problems: manifest was being cached
// header("Cache-Control: no-cache, private");//fixed the problem after clearing browser cached and offline cache
header('Content-Type: text/cache-manifest');
echo "CACHE MANIFEST\n";

$hashes = "";

$dir = new RecursiveDirectoryIterator(".");
foreach(new RecursiveIteratorIterator($dir) as $file) {
	if ($file->IsFile() &&
		$file != ".\manifest.php" &&
		$file != ".\cache.manifest" &&
		$file != ".\ping\ping.js" &&
		substr($file, 0, 9) != ".\\archive" &&
		substr($file->getFilename(), 0, 1) != ".")
	{
		// $subbedfile = str_replace('\\','/',$file);
		// $susubbedfile = str_replace('./','/',$subbedfile);
		// echo $susubbedfile . "\n";
		echo $file . "\n";
		$hashes .= md5_file($file);
	}
}
echo "\n";
echo "NETWORK:\n";
echo "*\n";
echo "# Hash: " . md5($hashes) . "\n";
?>