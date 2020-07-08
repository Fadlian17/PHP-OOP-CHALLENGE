
<?php

// function md5(), sha1() and sha256() and sha512()

class Hash
{
    public $secrets;
    function __construct($secrets)
    {
        $this->secrets = $secrets;
    }

    function md5()
    {
        $md5 = md5('md5,$md5');
        echo $md5('md5', $secrets);
    }
}
