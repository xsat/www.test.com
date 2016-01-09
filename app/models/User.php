<?php

namespace Models;

class User extends Model
{
    public $id;
    public $login;
    public $password;

    public function getPassword()
    {
        if (strlen($this->password) == 64) {
            return trim($this->di['password']->get($this->password));
        }

        return $this->password;
    }

    protected function beforeSave()
    {
        $this->password = $this->di['password']->set($this->password);
    }

    public function getSearch($params)
    {
        return $this->find([
            'login LIKE :s:',
            'bind' => $params,
        ]);
    }

    public function getGridFields()
    {
        return [
            'login' => 'Логін'
        ];
    }

    public function isAuth($login, $password)
    {
        return $this->findFirst([
            'login = :login: AND password = :password:',
            'bind' => [
                'login' => $login,
                'password' => $this->di['password']->set($password),
            ],
        ]);
    }
}