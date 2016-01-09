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

    public function indexAction()
    {
        $places = \Models\Place::find('place_id IS NULL OR place_id = 0');
        $id = $this->dispatcher->getParam('id');
        $place = \Models\Place::findFirst($id);

        if (!$place) {
            $place = \Models\Place::findFirst('place_id IS NULL OR place_id = 0');
        }

        if (isset($place->id) && $place->id) {
            $this->tag->setTitle($place->name);
            $this->view->setVar('breadcrumbs', $place->getBreadcrumbs());
        }

        $this->view->setVars([
            'places' => $places,
            'place' => $place,
        ]);
    }

    public function loginAction()
    {
        if ($this->userSession->get()) {
            return $this->response->redirect('/');
        }

        $places = \Models\Place::find('place_id IS NULL OR place_id = 0');
        $form = new \Forms\LoginForm();
        $model = new \Models\User();
        $form->setEntity($model);

        if ($this->request->isPost() && $form->isValid($this->request->getPost())) {
            $this->userSession->set(1);

            return $this->response->redirect('/user');
        }

        $this->view->setVars([
            'places' => $places,
            'form' => $form,
        ]);

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
