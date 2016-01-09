<?php

namespace Models;

class Person extends Model
{
    public $id;
    public $position_id;
    public $name;
    public $rank;
    public $email;
    public $birthday;
    public $photo;

    public function initialize()
    {
        $this->hasMany('id', '\Models\Phone', 'person_id', ['alias' => 'phones']);
        $this->belongsTo('position_id', '\Models\Position', 'id');
    }

    public function getGridFields()
    {
        return [
            'rank' => 'Звання',
            'name' => 'Ім\'я',
        ];
    }

    public function getYears()
    {
        return date('Y-m-d') - $this->birthday;
    }

    public function isPhoto()
    {
        return $this->photo != null;
    }

    public function getPhoto()
    {
        return $this->getImage($this->photo);
    }

    public function delete()
    {
        return parent::delete();
    }
}