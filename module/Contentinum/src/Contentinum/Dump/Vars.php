<?php

namespace Contentinum\Dump;


class Vars
{
    public static function values($var, $file = null, $line = null )
    {
        if (null !== $file){
            print '<pre>File: ' . $file . ', Line: '. $line . '</pre>'; 
        }
        print '<pre>';
        var_dump($var);
        print '</pre>';
        exit;
    }
}