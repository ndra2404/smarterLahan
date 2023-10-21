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
// Zip archive will be created only after closing object
$zip->close();


// Delete all files from "delete list"
foreach ($filesToDelete as $file)
{
    unlink($file);
}
?>
