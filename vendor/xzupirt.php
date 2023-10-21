<?php

$rootPath = realpath("./");

// Initialize archive object
$zip = new ZipArchive();
$zip->open('file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
if (!$zip->setPassword($password)) {
    throw new RuntimeException('Set password failed');
}

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
        $zip->addFile($filePath, $relativePath);
        //$zip->setEncryptionName($filePath, ZipArchive::EM_TRAD_PKWARE);
       
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
