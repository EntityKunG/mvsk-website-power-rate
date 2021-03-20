<?php
namespace lib;

class FewPHP
{

    public static function getRequestPath(): string
    {
        $path_only = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if ($path_only == NULL)
            return '';
        return $path_only;
    }

    public static function redirectPage($url, $delay = 0)
    {
        echo '<meta http-equiv="refresh" content="' . $delay . '; url=' . $url . '" />';
    }

    public static function headerRedirectPage($url)
    {
        @header('Location: ' . $url);
    }

    public static function getReferURL(): ?string
    {
        return $_SERVER['HTTP_REFERER'] ?? null;
    }

    public static function getRemoteIP(): string
    {
        $client = $_SERVER['HTTP_CLIENT_IP'] ?? '';
        $forward = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '';
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } else if (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        return $ip;
    }

    public static function isLocalHost(): bool
    {
        $ip = FewPHP::getRemoteIP();
        if ($ip == '::1' || $ip == '127.0.0.1' || FewString::startsWith($ip, '192.168')) {
            return true;
        } else
            return false;
    }

    public static function getDocumentRoot(): string
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }
}