<?php
/**
 * Created by PhpStorm.
 * User: Maps_red
 * Date: 19/12/2015
 * Time: 01:20
 */

$dirname = 'files/';
$dir = opendir($dirname);

while($file = readdir($dir)) {
    if($file != '.' && $file != '..' && !is_dir($dirname.$file))
    {
        $fileTime = filemtime($dirname.$file);
        $time = ceil(microtime(true));

        if ($time >= $fileTime+7200) {
            unlink($dirname.$file);
        }
    }
}

closedir($dir);