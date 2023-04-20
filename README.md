# encrypt-decrypt
## encrypt-decrypt, using AES-128-CBC Cyper can be able to encrypt and decrypt text and some multimedia files, with this function.

-   #### Manual Use
    - [ https://www.php.net/manual/en/function.openssl-encrypt.php ] Openssl PHP.NET
    - [ https://www.php.net/manual/en/function.openssl-get-cipher-methods.php ] Cyper PHP.NET
    - [ Google search ].


    ##### How to use

        $data =  array(
            'final_name.mp3', 
            '123456', 
            'final_name.whatever'
        );
        
        AESencrypt($[0], $[1], $[2]);
