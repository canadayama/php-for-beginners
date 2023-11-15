<?php

/**
 * Undocumented class
 */
class Validator
{
    /**
     * Undocumented function
     *
     * @param [type] $value
     * @param integer $min
     * @param [type] $max
     * @return bool
     */
    public static function string($value, $min = 1, $max = INF) : bool
    {
        $value = trim($value);

        return (strlen($value) >= $min) && (strlen($value) <= $max);
    }

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return string
     */
    public static function email($value) : string
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
