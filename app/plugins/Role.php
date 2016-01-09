<?php

namespace Plugins;

class Role extends \Phalcon\Mvc\User\Plugin
{
    private $accesses;

    public function __construct($accesses = [])
    {
        $this->setAccesses($accesses);
    }

    private function setAccesses($accesses)
    {
        foreach ($accesses as $role => $params) {
            foreach ($params as $controller  => $actions) {
                if (is_array($actions)) {
                    foreach ($actions as  $action) {
                        $this->allow($role, $controller, $action);
                    }
                } else {
                    $this->allow($role, $controller, $actions);
                }
            }
        }
    }

    private function allow($role, $controller, $action)
    {
        $this->accesses[$role][$controller][] = $action;
    }

    public function isAllow($role, $controller, $action)
    {
        if (isset($this->accesses[$role][$controller])) {
            return in_array('*', $this->accesses[$role][$controller]) || in_array($action, $this->accesses[$role][$controller]);
        }

        return false;
    }
}