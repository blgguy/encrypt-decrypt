# encrypt-decrypt
## encrypt-decrypt, using AES-128-CBC Cyper can be able to encrypt and decrypt text and some multimedia files, with this function.

-   #### Manual Use
    - [ https://www.php.net/manual/en/function.openssl-encrypt.php ] Openssl PHP.NET
    - [ https://www.php.net/manual/en/function.openssl-get-cipher-methods.php ] Cyper PHP.NET
    - [ Google search ].


-   #### How to use

        - Encryption
            $data =  array(
                'final_name.mp3', 
                '123456', 
                'final_name.whatever'
            );
            
            AESencrypt($data[0], $data[1], $data[2]);

        - Decryption
            $decrypted =  array(
                'final_name.whatever', 
                '123456', 
                'final_name.mp3'
            );
            
            AESdecrypt($decrypted[0], $decrypted[1], $decrypted[2]);
