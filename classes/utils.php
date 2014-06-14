<?php

/**
 * Description of Time
 *
 * @author Reaby
 */
class Time
{
    public static function fromTM($timestamp)
    {
	$time = abs(intval($timestamp));

	$cent = str_pad(($time % 1000), 3, '0', STR_PAD_LEFT);
	$time = floor($time / 1000);
	$sec = str_pad($time % 60, 2, '0', STR_PAD_LEFT);
	$min = str_pad(floor($time / 60), 1, '0');
	$time = $min . ':' . $sec . '.' . $cent;
	return $time;
    }

}
