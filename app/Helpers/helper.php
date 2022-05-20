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
 * @param null $input
 * @return array|mixed
 */
function attendanceStatus($input = null): mixed
{
    $output = [
        NOT_CHECKED_IN => __('Not Checked In'),
        CHECKED_IN => __('Checked In'),
        CHECKED_OUT => __('Checked Out'),
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

function date_range($first, $last, $output_format = 'd/m/Y', $step = '+1 day' ) {

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}
