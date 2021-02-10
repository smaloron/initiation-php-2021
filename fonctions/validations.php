<?php
function validateAge($value)
{
    $value = (int) $value;
    return is_int($value) && $value >= 7 && $value <= 77;
}
