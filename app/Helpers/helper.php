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
