<?php

namespace Models;

class Model extends \Phalcon\Mvc\Model
{
    public function getSearch($params)
    {
        return $this->find([
            'name LIKE :s:',
            'bind' => $params,
        ]);
    }

    public function getLike($value)
    {
        return '%' . $value . '%';
    }

    public function getGridFields()
    {
        return [
            'id' => 'ID'
        ];
    }

    public function getCopyFields()
    {
        return [
            'id' => null,
        ];
    }

    public function saveImage($image)
    {
        $fileName = $this->id . '.' . $image->getExtension();
        $filePath = $this->getFileDir() . $fileName;

        if (property_exists($this, $image->getKey()) && $image->moveTo($filePath)) {
            $this->{$image->getKey()} = $fileName;

            return $this->save();
        }

        return true;
    }

    protected function getFileDir()
    {
        $config = $this->getDI()->get("config");

        return $config->content->dir .  $this->getClassAlias() . '/';
    }

    protected function getImage($imageName)
    {
        $config = $this->getDI()->get("config");

        return '/' . $config->content->name . '/' . $this->getClassAlias() . '/' . $imageName;
    }

    private function getClassAlias()
    {
        return strtolower(str_replace('Models\\', '', get_called_class()));
    }

    public function findParent($id = 0)
    {
        return [];
    }

    public function setParent($id = null)
    {
    }

    public function filterParams($params)
    {
        return $params;
    }

    public function getRanks()
    {
        return [
            'Солдат' => 'Солдат',
            'Старший солдат' => 'Старший солдат',
            'Молодший сержант' => 'Молодший сержант',
            'Сержант' => 'Сержант',
            'Старший сержант' => 'Старший сержант',
            'Старшина' => 'Старшина',
            'Прапорщик' => 'Прапорщик',
            'Старший прапорщик' => 'Старший прапорщик',
            'Молодший лейтенант' => 'Молодший лейтенант',
            'Лейтенант' => 'Лейтенант',
            'Старший лейтенант' => 'Старший лейтенант',
            'Капітан' => 'Капітан',
            'Майор' => 'Майор',
            'Підполковник' => 'Підполковник',
            'Полковник' => 'Полковник',
            'Генерал-майор' => 'Генерал-майор',
            'Генерал-лейтенант' => 'Генерал-лейтенант',
            'Генерал-полковник' => 'Генерал-полковник',
            'Генерал армії України' => 'Генерал армії України',
        ];
    }
}