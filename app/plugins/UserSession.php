<?php

namespace Plugins;

class UserSession extends Crypt
{

    public function get()
    {
        if ($this->session->has('user')) {
            $user_id = $this->decrypt($this->session->get('user'));

            return \Models\User::findFirst($user_id);
        }

        return null;
    }

    public function set($user_id)
    {
        $user = $this->encrypt((string)$user_id);
        $this->session->set('user', $user);
    }

    public function remove()
    {
        $this->session->remove('user');
    }
}