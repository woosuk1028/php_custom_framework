<?php

    function env($key)
    {
        $env = array();
        $env = parse_ini_file(dirname(__FILE__).'/../.env', TRUE);

        return $env[$key];
    }

    function xss_clean($data) {
        // 1. Remove ASCII characters that are out of range
        $data = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S', '', $data);

        // 2. Convert entities (URL-decoding)
        $data = str_replace(['&amp;', '&lt;', '&gt;'], ['&', '<', '>'], $data);
        $data = preg_replace_callback('/(&#0*[0-9]+);*/', function ($matches) {
            return chr($matches[1]);
        }, $data);
        $data = preg_replace_callback('/(&#x0*[0-9A-F]+);*/i', function ($matches) {
            return chr(hexdec($matches[1]));
        }, $data);

        $data = rawurldecode($data);

        // 3. Filter out potential javascript: and VBScript: protocols
        $data = preg_replace("#(^|\s|\()javascript(:|\s*\[)#i", "\\1java script\\2", $data);
        $data = preg_replace("#(^|\s|\()vbscript(:|\s*\[)#i", "\\1vbs script\\2", $data);

        // 4. Remove unwanted tags
        $data = strip_tags($data);

        // 5. Convert special characters to HTML entities
        $data = htmlentities($data, ENT_QUOTES, 'UTF-8');

        return $data;
    }