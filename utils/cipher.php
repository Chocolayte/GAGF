<?php


function HashPassword($password)
{
  return sha1(sha1($password."secretekey@"));
}

function CryptCookieMail($password)
{
	$salt = "*5$^1re@(-ù*1t5";
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $password, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

function DecryptCookieMail($cookie)
{
	$salt = "*5$^1re@(-ù*1t5";
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($cookie), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

?>