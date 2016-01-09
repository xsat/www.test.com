<?php

namespace Forms;

use \Phalcon\Validation\Validator\PresenceOf,
    \Phalcon\Forms\Element\Password;

class LoginForm extends UserForm
{
    public function initialize($model = null)
    {
        parent::initialize($model);
        $elements = $this->getElements();

        $this->add((new Password('password', [
            'class' => 'form-control',
            'placeholder' => 'Пароль',
        ]))->setLabel('Пароль')->addValidators([
            new PresenceOf([
                'message' => 'Пароль обов\'язковий',
            ]),
            new \Elements\Auth([
                'message' => 'Логін або пароль не вірний',
            ])
        ])->setFilters([
            'trim',
            'string',
        ]));
    }
}
