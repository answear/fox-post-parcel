<?php

namespace Answear\FoxPostParcel\Tests\Util;

class FileUtil
{
    public static function getFileContents(string $filePath): string
    {
        $contents = \file_get_contents($filePath);
        if (false === $contents) {
            throw new \InvalidArgumentException($filePath . ' does not contain any data.');
        }

        return $contents;
    }
}
