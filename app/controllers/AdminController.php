<?php

namespace Controllers;

class AdminController extends ParentController
{
    public function beforeExecuteRoute()
    {
        if (parent::beforeExecuteRoute()) {
            $this->assets->addCss('css/admin.css');
            $this->assets->addJs('js/admin.js');
        }
    }

    public function indexAction($id = null)
    {
        $this->tag->setTitle('Список ' . $this->getNames());

        $model = $this->getModel();
        $form = new \Forms\SearchForm();
        $pagination = new \Plugins\Pagination($model, $this->request->getQuery('page', 'int', 1));
        $filterParams = $id === null ? [] : $model->findParent($id);
        $filterParams = $model->filterParams($filterParams);
        $pagination->setFilterParams($filterParams);

        $this->view->setVars([
            'id' => $id,
            'form' => $form,
            'items' => $pagination->getItems()->toArray(),
            'pagination' => $pagination->getPages(),
            'fields' => $model->getGridFields(),
        ]);

        $this->view->setLayoutsDir('layouts/');
        $this->view->setLayout('admin');
    }

    public function searchAction()
    {
        $this->tag->setTitle('Пошук ' . $this->getNames());

        $model = $this->getModel();
        $search = $this->request->getQuery('s');
        $models = $model->getSearch([
            's' => $model->getLike($search),
        ]);
        $form = new \Forms\SearchForm();

        $this->view->setVars([
            'form' => $form,
            'items' => $models->toArray(),
            'fields' => $model->getGridFields(),
        ]);

        $this->view->partial(strtolower($this->router ->getControllerName()) . '/index');
        $this->view->setLayoutsDir('layouts/');
        $this->view->setLayout('admin');
    }

    public function addAction($id = null)
    {
        $this->tag->setTitle('Додати '. $this->getName());

        $model = $this->getModel();
        $form = $this->getForm();

        if ($id !== null) {
            $model->setParent($id);
        }

        $form->setEntity($model);

        if ($this->request->isPost() && $form->isValid($this->request->getPost())) {
            if ($this->saveForm($model)) {
                if ($id !== null) {
                    return $this->response->redirect('/' . $this->router ->getControllerName() . '/' . $id);
                }

                return $this->response->redirect('/' . $this->router ->getControllerName());
            }
        }

        $this->view->setVars([
            'id' => $id,
            'form' => $form,
        ]);
        $this->view->setLayoutsDir('layouts/');
        $this->view->setLayout('admin');
    }

    public function editAction($id)
    {
        $this->tag->setTitle('Редагувати ' . $this->getName());

        $model = $this->getModel()->findFirst($id);
        $form = $this->getForm($model);
        $form->setEntity($model);

        if ($this->request->isPost() && $form->isValid($this->request->getPost())) {
            if ($this->saveForm($model)) {
                return $this->response->redirect('/' . $this->router ->getControllerName());
            }
        }

        $this->view->setVar('form', $form);
        $this->view->setLayoutsDir('layouts/');
        $this->view->setLayout('admin');
    }

    protected function saveForm($model)
    {
        return $model->save($this->request->getPost());
    }

    public function deleteAction($id)
    {
        $model = $this->getModel()->findFirst($id);
        $model->delete();

        return $this->response->redirect('/' . $this->router->getControllerName());
    }

    public function copyAction($id)
    {
        $model = $this->getModel()->findFirst($id);

        foreach ($model->getCopyFields() as $field => $value) {
            $model->{$field} = $value;
        }

        $model->create();

        return $this->response->redirect('/' . $this->router->getControllerName());
    }

    protected function getModel()
    {
        $name = '\\Models\\' . $this->getModelName();

        return new $name();
    }

    protected function getForm($model = null)
    {
        $name = '\\Forms\\' . $this->getModelName() . 'Form';

        return new $name($model);
    }

    protected function getModelName()
    {
        return ucfirst($this->router ->getControllerName());
    }

    protected function getNames()
    {
        return '';
    }

    protected function getName()
    {
        return '';
    }
}