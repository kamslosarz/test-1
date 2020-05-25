<?php

namespace App\FileStorage;

class FileStorage
{
    protected string $storageDir;

    public function __construct($storageDir)
    {
        $this->storageDir = $storageDir;
    }

    public function saveArray(array $data, string $filename): string
    {
        $contents = '';
        foreach($data as $item)
        {
            $contents .= $item . PHP_EOL;
        }

        $file = $this->storageDir . $filename;
        touch($file);
        file_put_contents($file, $contents);

        return $file;
    }

    public function getFilePath(string $filename): string
    {
        return $this->storageDir . $filename;
    }
}