<?php

namespace Controllers;

class PositionController extends OrderController
{
    protected function getNames()
    {
        return 'посад';
    }

    protected function getName()
    {
        return 'посаду';
    }
}