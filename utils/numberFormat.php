<?php
function formatNumberInK($number)
{
    if ($number >= 1000) {
        return round($number / 1000, 1) . 'k';
    } else {
        return $number;
    }
}
