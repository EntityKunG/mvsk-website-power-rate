<?php
namespace lib;

class FewString {
    
    const MAX_MYSQL_TEXT_LENGTH = 21844;
    
    public static function trimString(string $input, int $not_longer_than): ?string{
        if ($input != null) {
            $input = trim($input);
            if (mb_strlen($input, 'utf-8') > $not_longer_than) {
                $input = mb_substr($input, 0, $not_longer_than);
            }
        } else {
            return null;
        }
    }
    
    public static function startsWith(string $whole_string, string $to_search): bool{
        $length = strlen($to_search);
        return (substr($whole_string, 0, $length) === $to_search);
    }
    
    public static function endsWith($whole_string, $to_search): bool{
        $length = strlen($to_search);
        if ($length == 0) {
            return true;
        }
        return (substr($whole_string, -$length) === $to_search);
    }
    
    public static function stringContain($whole_string, $to_sarch): bool{
        return strpos($whole_string, $to_sarch) !== false;
    }
}