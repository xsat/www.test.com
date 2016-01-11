<?php

namespace Controllers;

use Models\Model;

class IndexController extends ParentController
{
    public function beforeExecuteRoute()
    {
        if (parent::beforeExecuteRoute()) {
            $this->assets->addCss('css/style.css');
        }
    }

    public function afterExecuteRoute()
    {
        $this->leftMenuPlaces();
    }

    private function leftMenuPlaces()
    {
        $places = \Models\Place::find([
            'conditions' => 'place_id IS NULL OR place_id = 0',
            'order' => '_order DESC'
        ]);

        $this->view->setVar('places', $places);
    }

    public function indexAction()
    {
        $id = $this->dispatcher->getParam('id');
        $place = \Models\Place::findFirst($id);

        if (!$place) {
            if ($id) {
                return $this->errorAction();
            }

            $place = \Models\Place::findFirst('place_id IS NULL OR place_id = 0');
        }

        if (isset($place->id) && $place->id) {
            $this->tag->setTitle($place->name);
            $this->view->setVar('breadcrumbs', $place->getBreadcrumbs());
        }

        $this->view->setVar('place', $place);
    }

    public function loginAction()
    {
        if ($this->userSession->get()) {
            return $this->response->redirect('/');
        }

        $form = new \Forms\LoginForm();
        $model = new \Models\User();
        $form->setEntity($model);

        if ($this->request->isPost() && $form->isValid($this->request->getPost())) {
            $this->userSession->set(1);

            return $this->response->redirect('/user');
        }

        $this->view->setVar('form', $form);
        $this->tag->setTitle('Зайти в адмін панель');
    }

    public function logoutAction()
    {
        $this->userSession->remove();

        return $this->response->redirect('/');
    }

    public function errorAction()
    {
        $this->tag->setTitle('Сторінка не знайдена');
        $this->response->setStatusCode(404, "Not Found");
    }
}
