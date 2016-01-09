<?php

namespace Controllers;

class UserController extends AdminController
{
    protected function getNames()
    {
        return 'користувачів';
    }

    protected function getName()
    {
        return 'користувача';
    }
}