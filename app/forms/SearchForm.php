<?php

namespace Forms;

use \Phalcon\Forms\Form,
    \Phalcon\Forms\Element\Text;

class SearchForm extends Form
{
    public function initialize()
    {
        $value = $this->request->getQuery('s');

        $this->add((new Text('s', [
            'class' => 'form-control',
            'placeholder' => 'Пошук...',
            'value' => $value
        ]))->setFilters([
            'trim',
            'string',
        ]));
    }
}
