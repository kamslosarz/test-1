<?php

namespace App\FileStorage;

class FileStorage
{
    protected string $storageDir;

    public function saveArray(array $data, string $filename): string
    {
        $contents = '';
        foreach($data as $item)
        {
            $contents .= $item . PHP_EOL;
        }

        touch($filename);
        file_put_contents($filename, $contents);

        return $filename;
    }

}