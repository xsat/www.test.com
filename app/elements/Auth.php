<?php

namespace Elements;

class Auth extends \Phalcon\Mvc\Model\Validator
{
    public function validate(\Phalcon\Validation $validator, $attribute)
    {
        $user = new \Models\User();

        if (!$user->isAuth($validator->getValue('login'), $validator->getValue($attribute))) {
            $validator->appendMessage(new \Phalcon\Validation\Message(
                $this->getOption('message'),
                $attribute
            ));

            return false;
        }

        return true;
    }
}