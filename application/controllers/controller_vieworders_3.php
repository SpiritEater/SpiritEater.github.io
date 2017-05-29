<?php

class Controller_vieworders_3 extends Controller
{

	function __construct( )
	{	
		$this->model = new Model_vieworders_3( );
                $this->view = new View( );
	}
        function action_index( )
        {
                $data = $this->model->get_data( );
                
                $this->view->generate ('vieworders_3_view.php' , 'template_view.php', $data);
        }
}