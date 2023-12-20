<?php

/**
 * @author      Hi-Teak Digital Solution Ltd
 * @copyright   Copyright (c), 2023 Hi-Teak Digital Solution Ltd
 * @license     MIT public license
 */

 namespace  App\Core;

 // Class CSRF.

class CSRF
{
    private static $tokenName = 'csrf_token';
    private static $key = 'some_random_key';

    // Generate a new token and store it in the session
    public static function generateToken()
    {
        if (!isset($_SESSION[self::$tokenName])) {
            $_SESSION[self::$tokenName] = sha1(self::$key . uniqid(rand(), TRUE));
        }
    }

    // Return the current token
    public static function getToken()
    {
        return isset($_SESSION[self::$tokenName]) ? $_SESSION[self::$tokenName] : '';
    }

    // Validate a token
    public static function validateToken($token)
    {
        if (isset($_SESSION[self::$tokenName]) && $token === $_SESSION[self::$tokenName]) {
            return true;
        }
        return false;
    }
}
