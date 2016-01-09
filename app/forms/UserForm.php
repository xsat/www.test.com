<?php

namespace Forms;

use \Phalcon\Forms\Element\Text,
    \Phalcon\Validation\Validator\PresenceOf;

class UserForm extends ParentForm
{
    public function initialize($model = null)
    {
        $this->add((new Text('login', [
            'class' => 'form-control',
            'placeholder' => 'Логін',
        ]))->setLabel('Логін')->addValidator(
            new PresenceOf([
                'message' => 'Логін обов\'язковий',
            ])
        )->setFilters([
            'trim',
            'string',
        ]));

        $this->add((new Text('password', [
            'class' => 'form-control',
            'placeholder' => 'Пароль',
        ]))->setLabel('Пароль')->addValidator(
            new PresenceOf([
                'message' => 'Пароль обов\'язковий',
            ])
        )->setFilters([
            'trim',
            'string',
        ]));
    }
}
