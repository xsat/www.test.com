<?php

namespace Models;

class Order extends Model
{
    public $_order;

    public function beforeValidationOnCreate()
    {
        $maxOrder = $this->maximum(['column' => '_order']);
        $this->_order = ++$maxOrder;
    }

    public function beforeValidationOnUpdate()
    {
        if ($this->_order === null) {
            $maxOrder = $this->maximum(['column' => '_order']);
            $this->_order = ++$maxOrder;
        }
    }

    public function setOrderUp()
    {
        $prevModel = self::findFirst($this->findOrderUp());

        if ($prevModel) {
            $this->swapAndSave($prevModel);
        }
    }

    public function setOrderDown()
    {
        $nextModel = self::findFirst($this->findOrderDown());

        if ($nextModel) {
            $this->swapAndSave($nextModel);
        }
    }

    protected function findOrderUp()
    {
        return [
            'conditions' => 'id != :id: AND _order >= :order:',
            'bind' => [
                'id' => $this->id,
                'order' => $this->_order,
            ],
            'order' => '_order ASC',
        ];
    }

    protected function findOrderDown()
    {
        return  [
            'conditions' => 'id != :id: AND _order <= :order:',
            'bind' => [
                'id' => $this->id,
                'order' => $this->_order,
            ],
            'order' => '_order DESC',
        ];
    }

    private function swapAndSave($model)
    {
        $tempOrder = $model->_order;
        $model->_order = $this->_order;
        $this->_order = $tempOrder;
        $model->save();
        $this->save();
    }

    public function filterParams($params)
    {
        return array_merge_recursive($params, [
            'order' => '_order DESC'
        ]);
    }
}