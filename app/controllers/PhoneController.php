<?php

namespace Controllers;

class PhoneController extends OrderController
{
    protected function getNames()
    {
        return 'телефонів';
    }

    protected function getName()
    {
        return 'телефон';
    }
}