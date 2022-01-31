<?php

namespace my\Helpers;

class Utils {

    public static function generatePassword ($type, $lenght)
    {

        switch ($type) {
            case 1: {
                $input = '1234567890';
                break;
            }
            case 2: {
                $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            }
            case 3: {
                $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@&?^%';
                break;
            }
            case 4: {
                $input = '0123456789abcdefghijklmnopqrstuvwxyz';
                break;
            }
            default: {
                $input = null;
            }
        }
 
        return $input ? substr(str_shuffle($input), 0, $lenght) : null;
    }

}