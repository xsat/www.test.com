<?php

namespace Plugins;

class Crypt extends \Phalcon\Mvc\User\Component
{
    private $crypt;

    public function __construct()
    {
        srand(9951);
        $this->crypt = new \Phalcon\Crypt();
        $this->crypt->setKey('23kl4@#123+1lf33');
    }

    protected final function encrypt($decrypted)
    {
        return $this->crypt->encrypt($decrypted);
    }

    protected final function decrypt($encrypted)
    {
        return $this->crypt->decrypt($encrypted);
    }
}