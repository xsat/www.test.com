<?php

namespace Models;

class Place extends Order
{
    public $id;
    public $place_id;
    public $name;
    public $alias;
    public $level;

    public function initialize()
    {
        $this->hasMany('id', '\Models\Position', 'place_id', ['alias' => 'positions']);
        $this->hasMany('id', '\Models\Place', 'place_id', ['alias' => 'places']);
        $this->belongsTo('place_id', '\Models\Place', 'id', ['alias' => 'prev_place']);
    }

    public function beforeSave()
    {
        if ($this->alias == null) {
            $this->alias = $this->name;
        }

        if ($this->level == null) {
            $this->level = 0;
        }
    }

    public function getGridFields()
    {
        return [
            'name' => 'Ім\'я'
        ];
    }

    public function getPlaces()
    {
        $params = [
            'conditions' => 'id != :id: AND place_id != :id:',
            'columns' => ['id', 'name'],
            'bind' => [
                'id' => $this->id,
            ]
        ];

        if ($this->id === null) {
            $params['conditions'] = 'place_id = 0';
        }

        $placeModels = Place::find($params);

        $places = [0 => 'Немає'];

        foreach ($placeModels as $place) {
            $places[$place->id] = $place->name;
        }

        return $places;
    }

    public function getSelectPlaces()
    {
        $placeModels = Place::find();
        $places = [0 => 'Немає'];

        foreach ($placeModels as $place) {
            $places[$place->id] = $place->name;
        }

        return $places;
    }

    public function getBreadcrumbs()
    {
        $breadcrumbs = $this->breadcrumbs();

        return array_reverse($breadcrumbs);
    }

    public function breadcrumbs($breadcrumbs = [])
    {
        $breadcrumbs['/' . $this->id] = $this->name;

        if ($this->prev_place && $this->prev_place->id) {
            return $this->prev_place->breadcrumbs($breadcrumbs);
        }

        return $breadcrumbs;
    }

    public function findParent($id = 0)
    {
        return [
            'conditions' => 'place_id = :place_id:',
            'bind' => [
                'place_id' => $id,
            ],
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