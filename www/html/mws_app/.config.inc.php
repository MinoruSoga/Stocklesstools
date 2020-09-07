<?php
    define('AWS_ACCESS_KEY_ID', 'AKIAJTTGBUMUZ6VHLA3A');
    define('AWS_SECRET_ACCESS_KEY', 'dnrGugo3aD6cYcAGwnRvqZlgJZQKsdYFFkB5IdIC');
    define('APPLICATION_NAME', '<Your Application Name>');
    define('APPLICATION_VERSION', '<Your Application Version or Build Number>');
    define ('MERCHANT_ID', 'A3LIDTGANAESGU');
    define ('MARKETPLACE_ID', 'A1VC38T7YXB528');
    set_include_path(get_include_path() . PATH_SEPARATOR . './src');

     function __autoload($className){
        $filePath = str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        $includePaths = explode(PATH_SEPARATOR, get_include_path());
        foreach($includePaths as $includePath){
            if(file_exists($includePath . DIRECTORY_SEPARATOR . $filePath)){
                require_once $filePath;
                return;
            }
        }
    }

