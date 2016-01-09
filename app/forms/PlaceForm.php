<?php

namespace Forms;

use \Phalcon\Forms\Element\Select,
    \Phalcon\Forms\Element\Text,
    \Phalcon\Validation\Validator\PresenceOf;

class PlaceForm extends ParentForm
{
    public function initialize($model = null)
    {
        if (!$model) {
            $model = new \Models\Place();
        }

        $places = $model->getPlaces();

        $this->add((new Select('place_id', $places, [
            'class' => 'form-control',
        ]))->setLabel('Керівне місце')->setFilters([
            'int',
        ]));

        $this->add((new Text('name', [
            'class' => 'form-control',
            'placeholder' => 'Назва',
        ]))->setLabel('Назва')->addValidator(
            new PresenceOf([
                'message' => 'Назва обов\'язкова'
            ])
        )->setFilters([
            'trim',
            'string',
        ]));
    }

    public function additional()
    {
        $entity = $this->getEntity();

        $html = $this->buttonHtml(
            'Посади',
            $this->url->get('position' . ($entity->id ? ('/' . $entity->id) : '')),
            'glyphicon glyphicon-briefcase'
        );

        $html .= $this->buttonHtml(
            'Місця',
            $this->url->get('place' . ($entity->id ? ('/' . $entity->id) : '')),
            'glyphicon glyphicon-globe'
        );

        return $html;
    }
}
