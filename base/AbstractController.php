<?php
namespace Base;

class AbstractController
{
    /** @var View */
    protected $view;

    public function setView(View $view)
    {
        $this->view = $view;
    }
}