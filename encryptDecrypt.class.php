<?php

/*
* @ Author Aminu M. Bulangu
* @ Email: bulangu@blg.com.ng
* @ 
*/

class ENCDECRYPT {
    /**
        * load 320kb into memory.
    */

    // AES ENCRYPT METHOD

    public function AESencrypt($source, $key, $dest) {

        $key = substr(sha1($key, true), 0, 16);
        $iv = openssl_random_pseudo_bytes(16);

        $err = false;
        if ($fpOut = fopen($dest, 'w')) {

            fwrite($fpOut, $iv);
            if ($fpIn = fopen($source, 'rb')) {
                while (!feof($fpIn)) {
                    $plaintext = fread($fpIn, 16 * 20000);
                    $ciphertext = openssl_encrypt($plaintext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
                    $iv = substr($ciphertext, 0, 16);
                    fwrite($fpOut, $ciphertext);
                }
                fclose($fpIn);
            } else {
                $err = true;
            }
            fclose($fpOut);
        } else {
            $err = true;
        }

        return $err ? false : $dest;

    }

    
    // AES DECRYPT METHOD

    public function AESdecrypt($source, $key, $dest){

        $key = substr(sha1($key, true), 0, 16);

        $err = false;
        if ($fpOut = fopen($dest, 'w')) {
            if ($fpIn = fopen($source, 'rb')) {
                // Get the initialzation vector from the beginning of the file
                $iv = fread($fpIn, 16);
                while (!feof($fpIn)) {
                    // we have to read one block more for decrypting than for encrypting
                    $ciphertext = fread($fpIn, 16 * (20000 + 1)); 
                    $plaintext = openssl_decrypt($ciphertext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
                    // Use the first 16 bytes of the ciphertext as the next initialization vector
                    $iv = substr($ciphertext, 0, 16);
                    fwrite($fpOut, $plaintext);
                }
                fclose($fpIn);
            } else {
                $err = true;
            }
            fclose($fpOut);
        } else {
            $err = true;
        }

        return $err ? false : $dest;
    }

    
}

?>