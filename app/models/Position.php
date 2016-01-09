<?php

namespace Models;

class Position extends Order
{
    public $id;
    public $place_id;
    public $name;
    public $rank;
    public $level;

    public function initialize()
    {
        $this->hasOne('id', '\Models\Person', 'position_id', ['alias' => 'person']);
        $this->belongsTo('place_id', '\Models\Place', 'id', ['alias' => 'place']);
    }

    public function getGridFields()
    {
        return [
            'rank' => 'Звання',
            'name' => 'Ім\'я',
        ];
    }

    public function getCopyFields()
    {
        return [
            'id' => null,
            'place_id' => 0,
        ];
    }

    public function getSelectPositions($person_id = false)
    {
        $positionModels = $this->getVacant($person_id);
        $positions = [0 => 'Немає'];

        foreach ($positionModels as $position) {
            $name = $position->name;

            if (isset($position->place) && isset($position->place->name) && $position->place->name) {
                $name = '(' . $position->place->name . ') ' . $name;
            }

            $positions[$position->id] = $name;
        }

        return $positions;
    }

    public function getVacant($person_id = false)
    {
        $builder = $this->getModelsManager()
            ->createBuilder()
            ->from('Models\Position')
            ->leftJoin('Models\Person', 'Models\Position.id = Models\Person.position_id')
            ->where('Models\Person.id IS NULL');

        if ($person_id) {
            $builder->orWhere('Models\Person.id = :person_id:', ['person_id' => $person_id]);
        }

        return $builder->getQuery()
            ->execute();
    }

    public function findParent($id = 0)
    {
        return [
            'conditions' => 'place_id = :place_id:',
            'bind' => [
                'place_id' => $id,
            ]
        ];
    }

    public function setParent($id = null)
    {
        $this->place_id = $id;
    }

    protected function findOrderUp()
    {
        return [
            'conditions' => 'id != :id: AND place_id = :place_id: AND _order >= :order:',
            'bind' => [
                'id' => $this->id,
                'order' => $this->_order,
                'place_id' => $this->place_id,
            ],
            'order' => '_order ASC',
        ];
    }

    protected function findOrderDown()
    {
        return [
            'conditions' => 'id != :id: AND place_id = :place_id: AND _order <= :order:',
            'bind' => [
                'id' => $this->id,
                'order' => $this->_order,
                'place_id' => $this->place_id,
            ],
            'order' => '_order DESC',
        ];
    }
}