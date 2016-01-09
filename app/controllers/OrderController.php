<?php

namespace Controllers;

class OrderController extends AdminController
{
    public function orderAction()
    {
        if ($this->request->isPost() && $this->request->isAjax()) {
            $id = $this->request->getPost('id');
            $model = $this->getModel();
            $model = $model->findFirst($id);

            if ($model) {
                if ($this->request->getPost('order') == "up") {
                    $model->setOrderUp();
                } else {
                    $model->setOrderDown();
                }

                return $this->ajax('true');
            }

            return $this->ajax('false');
        }

        return $this->errorAction();
    }

    private function ajax($content)
    {
        return $this->response->setContent(json_encode($content));
    }
}
