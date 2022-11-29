<?php

function gen_psw($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,;:!?(){}[]#.$/*-&@+£%";
    $psw = '';

    for ($i = 0; $i < $length; $i++) {
        $random = rand(0, strlen($chars) - 1);
        $psw .= substr($chars, $random, 1);
    }

    return $psw;
}
