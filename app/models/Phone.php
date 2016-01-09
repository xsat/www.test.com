<?php

namespace Models;

class Phone extends Order
{
    public $id;
    public $person_id;
    public $name;
    public $number;

    public function initialize()
    {
        $this->belongsTo('person_id', '\Models\Person', 'id');
    }

    public function getGridFields()
    {
        return [
            'name' => 'Примітка',
            'number' => 'Номер',
        ];
    }

    public function findParent($id = 0)
    {
        return [
            'conditions' => 'person_id = :person_id:',
            'bind' => [
                'person_id' => $id,
            ],
        ];
    }

    public function setParent($id = null)
    {
        $this->person_id = $id;
    }

    protected function findOrderUp()
    {
        return [
            'conditions' => 'id != :id: AND person_id = :person_id: AND _order >= :order:',
            'bind' => [
                'id' => $this->id,
                'order' => $this->_order,
                'person_id' => $this->person_id,
            ],
            'order' => '_order ASC',
        ];
    }

    protected function findOrderDown()
    {
        return [
            'conditions' => 'id != :id: AND person_id = :person_id: AND _order <= :order:',
            'bind' => [
                'id' => $this->id,
                'order' => $this->_order,
                'person_id' => $this->person_id,
            ],
            'order' => '_order DESC',
        ];
    }
}