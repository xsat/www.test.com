<?php

namespace Controllers;

class PersonController extends AdminController
{
    protected function getNames()
    {
        return 'особ';
    }

    protected function getName()
    {
        return 'особу';
    }

    protected function saveForm($model)
    {
        if (parent::saveForm($model)) {
            if ($this->request->hasFiles()) {
                $image = $this->request->getUploadedFiles();

                return $model->saveImage(current($image));
            }

            return true;
        }

        return false;
    }
}