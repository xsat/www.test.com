<?php

namespace Plugins;

class Pagination extends \Phalcon\Mvc\User\Component
{
    private $model;
    private $page;
    private $count;
    private $limit = 10;
    private $filterParams;

    public function __construct($model, $page = 1)
    {
        $this->model = $model;
        $this->page = (int)$page;
        $this->count = $this->model->count();
        $this->checkPage();
    }

    private function checkPage()
    {
        $count = $this->getCountPages();

        if ($this->page <= 0) {
            $this->page = 1;
        } else if ($this->page > $count && $count) {
            $this->page = $count;
        }
    }

    public function setFilterParams($params)
    {
        $this->filterParams = $params;
        $this->count = $this->model->count($params);
        $this->checkPage();
    }

    private function getCountPages()
    {
        return ceil($this->count / $this->limit);
    }

    public function getPages()
    {
        $pages = [];

        if ($this->count > $this->limit) {
            if ($this->page != 1) {
                $pages[0] = [
                    'page' => $this->page - 1,
                    'name' => '&laquo;',
                    'active' => false,
                ];
            }

            $count = $this->getCountPages();

            for ($page = 1; $page <= $count; $page++) {
                $pages[$page] = [
                    'page' => $page,
                    'name' => $page,
                    'active' => $this->page == $page ? true : false,
                ];
            }

            if ($this->page != $count) {
                $pages[$count + 1] = [
                    'page' => $this->page + 1,
                    'name' => '&raquo;',
                    'active' => false,
                ];
            }
        }

        return $pages;
    }

    public function getItems()
    {
        return $this->model->find(array_merge([
            'limit' => $this->limit,
            'offset' => ($this->page - 1) * $this->limit,
            'order' => 'id DESC'
        ], $this->filterParams));
    }
}