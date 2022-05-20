<?php

/**
 * @param null $input
 * @return array|mixed
 */
function userRoles($input = null): mixed
{
    $output = [
        OWNER_ROLE => __('Owner'),
        EMPLOYEE_ROLE => __('Employee'),
    ];

    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input];
    }
}

/**
 * @param int $length
 * @return string
 */
function randomNumber(int $length = 10): string
{
    $x = '123456789';
    $c = strlen($x) - 1;
    $response = '';
    for ($i = 0; $i < $length; $i++) {
        $y = rand(0, $c);
        $response .= substr($x, $y, 1);
    }

    return $response;
}
