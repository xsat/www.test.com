<?php

namespace Controllers;

class PlaceController extends OrderController
{
    protected function getNames()
    {
        return 'місць';
    }

    protected function getName()
    {
        return 'місце';
    }
}