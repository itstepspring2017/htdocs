<?php
class ControllerHome extends Controller
{
    public function action_home()
    {
        $view = new View("home");
        $view->useTemplate();
        $this->response($view);
    }
}