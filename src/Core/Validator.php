<?php

namespace Core;

/**
 * Undocumented class
 */
class Validator
{
    /**
     * Undocumented function
     *
     * @param mixed $value
     * @param integer $min
     * @param integer $max
     * @return bool
     */
    public static function string(string $value, int $min = 1, int | float $max = INF) : bool
    {
        return (strlen(trim($value)) >= $min) && (strlen($value) <= $max);
    }

    /**
     * Undocumented function
     *
     * @param mixed $value
     * @return bool
     */
    public static function email(string $value) : bool
    {
        return (bool)filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Undocumented function
     *
     * @param integer $value
     * @param integer $greaterThan
     * @return boolean
     */
    public static function greaterThan(int $value, int $greaterThan): bool {
        return $value > $greaterThan;
    }
}
