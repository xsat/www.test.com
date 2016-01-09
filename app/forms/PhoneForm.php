<?php

namespace Forms;

use \Phalcon\Forms\Element\Text,
    \Phalcon\Validation\Validator\PresenceOf;

class PhoneForm extends ParentForm
{
    public function initialize($model = null)
    {
        $this->add((new Text('name', [
            'class' => 'form-control',
            'placeholder' => 'Примітка',
        ]))->setLabel('Примітка')->setFilters([
            'trim',
            'string',
        ]));

        $this->add((new Text('number', [
            'class' => 'form-control',
            'placeholder' => 'Номер',
        ]))->setLabel('Номер')->addValidator(
            new PresenceOf([
                'message' => 'Номер обов\'язковий'
            ])
        )->setFilters([
            'trim',
            'string',
        ]));
    }
}
