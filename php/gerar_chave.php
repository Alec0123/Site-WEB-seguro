<?php

    $config = array(
        "config" => "C:/xampp/php/extras/openssl/openssl.cnf",  
        'private_key_bits'=> 2048,                               
        "digest_alg" => "sha512",                                 
        "private_key_type" => OPENSSL_KEYTYPE_RSA,                
    );

    $res = openssl_pkey_new($config);  

    openssl_pkey_export($res, $privKey, NULL, $config);

    $pubKey = openssl_pkey_get_details($res);   

    $pubKey = $pubKey["key"];                                    

    file_put_contents("private_key.pem", $privKey); 

    file_put_contents("public_key.pem", $pubKey);               

    $publicKey = file_get_contents('public_key.pem');  

    echo $publicKey;


?>
