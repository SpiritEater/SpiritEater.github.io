<?php

class Controller_orderform_3 extends Controller
{

        function action_index( )
        {
              $this->view->generate ('orderform_3_view.php' , 'template_view.php');
        }
}