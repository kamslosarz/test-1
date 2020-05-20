<?php

namespace App\FileStorage;

class FileStorage
{
    public function saveArray(array $data, string $file)
    {
        $contents = '';
        foreach($data as $item)
        {
            $contents .= $item . PHP_EOL;
        }

        touch($file);
        file_put_contents($file, $contents);
    }
}