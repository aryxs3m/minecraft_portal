<?php

namespace App\Helpers;

use phpDocumentor\Reflection\Types\Self_;

/**
 * Simple helper class that translates Minecraft color/formatting codes to jquery.terminal ready codes.
 */
abstract class RCONTerminalParser
{
    private static $inputPrefix = "§";
    private static $inputSuffix = "";
    private static $outputPrefix = "[[";
    private static $outputSuffix = "]";

    private static $codeTable = [

        // Colors
        '4' => ';darkred;',
        'c' => ';lightred;',
        '6' => ';gold;',
        'e' => ';yellow;',
        '2' => ';darkgreen;',
        'a' => ';green;',
        'b' => ';aqua;',
        '3' => ';darkaqua;',
        '1' => ';darkblue;',
        '9' => ';blue;',
        'd' => ';lightpurple;',
        '5' => ';purple;',
        'f' => ';white;',
        '7' => ';gray;',
        '8' => ';darkgray;',
        '0' => ';black;',

        // Format Codes
        'l' => 'b;;',
        'n' => 'u;;',
        'o' => 'i;;',
        'r' => ';lightgray;black'
    ];

    public static function convert($minecraftText)
    {
        $output = $minecraftText;

        foreach(self::$codeTable as $minecraftCode => $ansiCode)
        {
            $output = str_replace(
                self::$inputPrefix . $minecraftCode . self::$inputSuffix,
                self::$outputPrefix . $ansiCode . self::$outputSuffix,
                $output
            );
        }

        return $output;
    }
}
