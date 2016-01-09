<?php

namespace Forms;

use \Phalcon\Forms\Form;

class ParentForm extends Form
{
    public function message($name)
    {
        if ($this->hasMessagesFor($name)) {
            $html = '';

            foreach ($this->getMessagesFor($name) as $message) {
                $html .= $this->messageHtml($message);
            }

            return $html;
        }

        return '';
    }

    public function messages()
    {
        $entity = $this->getEntity();

        if ($entity->validationHasFailed()) {
            $html = '';

            foreach ($this->getMessages() as $message) {
                $html .= $this->messageHtml($message);
            }

            return $html;
        }

        return '';
    }

    protected function messageHtml($message)
    {
        return '<div class="alert alert-danger alert-bottom" role="alert">' . $message . '</div>';
    }

    public function additional()
    {
        return '';
    }

    public function buttonHtml($text, $link, $icon = null)
    {
        $html = '<a href="' . $link . '" class="offset-left btn btn-info">';

        if ($icon) {
            $html .= '<span class="' . $icon . '"></span> ';
        }

        $html .= $text;
        $html .= '</a>';

        return $html;
    }
}