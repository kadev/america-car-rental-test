<?php

namespace Mini\Libs;

use Mini\Model\User;
use stdClass;

class Helper
{
    static public function debugPDO($raw_sql, $parameters) {

        $keys = array();
        $values = $parameters;

        foreach ($parameters as $key => $value) {

            // check if named parameters (':param') or anonymous parameters ('?') are used
            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }

            // bring parameter into human-readable format
            if (is_string($value)) {
                $values[$key] = "'" . $value . "'";
            } elseif (is_array($value)) {
                $values[$key] = implode(',', $value);
            } elseif (is_null($value)) {
                $values[$key] = 'NULL';
            }
        }

        /*
        echo "<br> [DEBUG] Keys:<pre>";
        print_r($keys);

        echo "\n[DEBUG] Values: ";
        print_r($values);
        echo "</pre>";
        */

        $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);

        return $raw_sql;
    }



    static public function stripTags($variables, $allowedTags = null){
        if(is_array($variables)){
            $result = array();
            foreach ($variables as $key => $value){
                $result[$key] = strip_tags($value, $allowedTags);
            }
            return $result;
        }else{
            return strip_tags($variables, $allowedTags);
        }
    }

    static public function limitEcho($text, $length){
        if(strlen($text)<=$length) {
            echo $text;
        } else {
            $y=substr($text,0,$length) . '...';
            echo $y;
        }
    }

}