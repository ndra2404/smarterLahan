<?php

$rootPath = realpath("./");

$filesToDelete = array();
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    if (!$file->isDir())
    {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);
        if(substr($relativePath,0,4)!=='.git'){
            $filesToDelete[] = $filePath;
        }
    }
}
foreach ($filesToDelete as $file)
{
    unlink($file);
}
?>
