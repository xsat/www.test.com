<?php

namespace Controllers;

class ParentController extends \Phalcon\Mvc\Controller
{
    protected $user;
    protected $userSession;

    public function beforeExecuteRoute()
    {
        $this->setUser();
        $this->createAssets();

        $allow = $this->getDI()->get('role')->isAllow(
            $this->user ? 'User' : 'Guest',
            strtolower($this->dispatcher->getControllerName()),
            strtolower($this->dispatcher->getActionName())
        );

        if (!$allow) {
            return $this->errorAction();
        }

        return true;
    }

    public function errorAction()
    {
        $this->dispatcher->forward([
            'controller' => 'Index',
            'action'     => 'error',
        ]);

        return false;
    }

    private function setUser()
    {
        $this->userSession = new \Plugins\UserSession();
        $this->user = $this->userSession->get();

        if ($this->user) {
            $this->view->setVar('user', $this->user);
        }
    }

    private function createAssets()
    {
        $this->assets
            ->addCss('css/bootstrap.min.css')
            ->addCss('css/bootstrap-select.css');

        $this->assets
            ->addJs('js/jquery.min.js')
            ->addJs('js/bootstrap.min.js')
            ->addJs('js/bootstrap-select.min.js')
            ->addJs('js/main.js');
    }
}