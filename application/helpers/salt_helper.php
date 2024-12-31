<?php 

function encryptPassword($password) {
    // generate random salt
    //$salt = bin2hex(random_bytes(32));
    
    $salt = bin2hex(openssl_random_pseudo_bytes(32));
    
    // kemudian digabungkan password dan nilai salt
    $saltedPassword = $password . $salt;
    
    // hash saltedPassword 
    $hashedPassword = hash('sha256',$saltedPassword);
    
    // kembalikan nilai
    return ['hashedPassword' => $hashedPassword, 'salt' => $salt];
}

?>