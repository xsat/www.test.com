<?php

namespace Forms;

use \Phalcon\Forms\Element\Select,
    \Phalcon\Forms\Element\Text,
    \Phalcon\Validation\Validator\PresenceOf;

class PositionForm extends ParentForm
{
    public function initialize($model = null)
    {
        if (!$model) {
            $model = new \Models\Position();
        }

        $place = new \Models\Place();
        $places = $place->getSelectPlaces();

        $this->add((new Select('place_id', $places, [
            'class' => 'form-control',
        ]))->setLabel('Місце')->setFilters([
            'int',
        ]));

        $this->add((new Select('rank', $model->getRanks(), [
            'class' => 'form-control',
        ]))->setLabel('Звання')->setFilters([
            'trim',
            'string',
        ]));

        $this->add((new Text('name', [
            'class' => 'form-control',
            'placeholder' => 'Назва',
        ]))->setLabel('Назва')->addValidator(
            new PresenceOf([
                'message' => 'Назва обов\'язкова',
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
            'Особи',
            $this->url->get('person' . ($entity->id ? ('/' . $entity->id) : '')),
            'glyphicon glyphicon-user'
        );

        return $html;
    }
}
