<?php

namespace App;

use App\CodeGenerator\CodeGenerator;
use App\FileStorage\FileStorage;

class App
{
    /**
     * @param int $numberOfCodes
     * @param int $lengthOfCode
     * @param string $outputFile
     * @throws \Exception
     */
    public function __invoke(int $numberOfCodes, int $lengthOfCode, string $outputFile)
    {
        $codeGenerator = new CodeGenerator();
        $codes = $codeGenerator->generate($numberOfCodes, $lengthOfCode);

        $fileStorage = new FileStorage();
        $fileStorage->saveArray($codes, $outputFile);

        return $outputFile;
    }

    public function validate(array $parameters): void
    {
        if(!isset($parameters[1]) || !is_numeric($parameters[1]))
        {
            throw new \Exception('Invalid number of codes');
        }
        if(!isset($parameters[2]) || !is_numeric($parameters[1]))
        {
            throw new \Exception('Invalid length of code');
        }
        if(!isset($parameters[3]))
        {
            throw new \Exception('Invalid output file');
        }
        if(!is_writable(dirname($parameters[3])))
        {
            throw new \Exception(sprintf('File %s is not writeable', $parameters[3]));
        }

    }
}