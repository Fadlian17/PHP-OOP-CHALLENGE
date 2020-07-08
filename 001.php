
<?php

// function md5(), sha1() and sha256() and sha512()

class Hash
{
    protected $secrets;
    function __construct($secrets)
    {
        $this->secrets = $secrets;
    }

    function md5()
    {
        echo hash('md5', $this->secrets);
    }


    function sha1()
    {
        echo hash('sha1', $this->secrets);
    }

    function sha256()
    {
        echo hash('sha256', $this->secrets);
    }

    function sha512()
    {
        echo hash('sha512', $this->secrets);
    }
}


$hash_password = new Hash('secret');
echo "password md5 is : ";
$hash_password->md5();
echo "\n password sha1 is : ";
$hash_password->sha1();
echo "\n password sha256 is : ";
$hash_password->sha256();
echo "\n password sha512 is : ";
$hash_password->sha512();
