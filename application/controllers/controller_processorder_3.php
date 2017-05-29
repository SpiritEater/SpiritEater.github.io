<?php

class Controller_processorder_3 extends Controller
{

	function __construct( )
	{	
		$this->model = new Model_processorder_3( );
                $this->view = new View( );
	}
        function action_index( )
        {
                $data = $this->model->get_data( );
                $this->view->generate ('processorder_3_view.php' , 'template_view.php', $data);
        }
}