<?php

function encryptPassword($password)
{
    $salt = bin2hex(openssl_random_pseudo_bytes(32));
    $saltedPassword = $password . $salt;
    $hashedPassword = hash('sha256', $saltedPassword);
    return ['hashedPassword' => $hashedPassword, 'salt' => $salt];
}
