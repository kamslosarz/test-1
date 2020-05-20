<?php

namespace App\CodeGenerator;

class CodeGenerator
{
    const ALLOWED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function generate($numberOfCodes, $lengthOfCode): array
    {
        $generatedCodes = [];
        for($i = 0; $i < $numberOfCodes; $i++)
        {
            $generatedCodes[] = $this->generateSingleUniqueCode($lengthOfCode, $generatedCodes);
        }

        return $generatedCodes;
    }

    public function generateSingleUniqueCode($length, $generatedCodes): string
    {
        do {
            $code = '';
            $allowedCharsLength = strlen(self::ALLOWED_CHARS);
            for($i = 0; $i < $length; $i++)
            {
                $code .= self::ALLOWED_CHARS[rand(0, $allowedCharsLength - 1)];
            }
        } while(in_array($code, $generatedCodes));

        return $code;
    }
}