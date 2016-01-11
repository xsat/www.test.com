<?php

namespace Forms;

use \Phalcon\Forms\Element\Select,
    \Phalcon\Forms\Element\Date,
    \Phalcon\Forms\Element\Text,
    \Phalcon\Validation\Validator\PresenceOf;

class PersonForm extends ParentForm
{
    public function initialize($model = null)
    {
        $position = new \Models\Position();
        $positions = $position->getSelectPositions($model ? $model->id : false);

        $this->add((new Select('position_id', $positions, [
            'class' => 'form-control',
            'using' => ['id', 'name'],
            'default' => $model ? $model->id : '',
        ]))->setLabel('Посада')->setFilters([
            'int',
        ]));

        if (!$model) {
            $model = new \Models\Position();
        }

        $this->add((new Select('rank', $model->getRanks(), [
            'class' => 'form-control',
        ]))->setLabel('Звання')->setFilters([
            'trim',
            'string',
        ]));

        $this->add((new Text('name', [
            'class' => 'form-control',
            'placeholder' => 'Ім\'я',
            ]))->setLabel('Ім\'я')->addValidator(
            new PresenceOf([
                'message' => 'Ім\'я обов\'язкове',
            ])
        )->setFilters([
            'trim',
            'string',
        ]));

        $this->add((new Text('email', [
            'class' => 'form-control',
            'placeholder' => 'Електронна пошта',
        ]))->setLabel('Електронна пошта')->setFilters([
            'trim',
            'email',
        ]));

        $this->add((new Date('birthday', [
            'class' => 'form-control',
        ]))->setLabel('День народження')->addValidator(
            new PresenceOf([
                'message' => 'Дата обов\'язкова',
            ])
        )->setFilters([
            'trim',
            'string',
        ]));

        $this->add((new \Elements\Image('photo', [
            'class' => 'form-control',
        ]))->setLabel('Фотографія'));
    }

    public function additional()
    {
        $entity = $this->getEntity();

        $html = $this->buttonHtml(
            'Телефони',
            $this->url->get('phone' . ($entity->id ? ('/' . $entity->id) : '')),
            'glyphicon glyphicon-phone-alt'
        );

        return $html;
    }
}
