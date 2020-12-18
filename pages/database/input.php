<?php

class InputValidator
{
    static function sanitize($data)
    {
        return trim(htmlspecialchars($data));
    }

    static function email($data)
    {
        $data = self::sanitize($data);

        $data = filter_var($data, FILTER_VALIDATE_EMAIL);

        if ($data == false) {
            return null;
        }
        return $data;
    }

    static function string($data)
    {
        $data = self::sanitize($data);

        if (!is_string($data)) return null;

        return $data;
    }

    static function int($data)
    {
        $data = self::sanitize($data);
        $data = filter_var($data, FILTER_VALIDATE_INT);
        if ($data === false) {
            return null;
        }
        return $data;
    }

    static function password($data)
    {
        $data = self::sanitize($data);

        if (!is_string($data) || strlen($data) < 8) {
            return null;
        }

        return $data;
    }

    static function name($data)
    {
        $data = self::sanitize($data);

        if (!is_string($data) || !preg_match('/^([ \u00c0-\u01ffa-zA-Z\'\-])+$/', $data))
            return null;

        return $data;
    }
}
