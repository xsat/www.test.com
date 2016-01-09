<?php

namespace Plugins;

class Password extends Crypt
{
    public function set($decrypted)
    {
        if ($decrypted) {
            return $this->encrypt($decrypted);
        }

        return '';
    }

    public function get($encrypted)
    {
        if ($encrypted) {
            return $this->decrypt($encrypted);
        }

        return '';
    }
}