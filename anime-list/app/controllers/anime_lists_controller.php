<?php

class AnimeListsController extends MvcPublicController {
    

    	public function index() {
	    
			$params = $this->params;
			$params['per_page'] = 6;
			$collection = $this->model->paginate($params);
			$this->set('objects', $collection['objects']);
			$this->set_pagination($collection);

  		}


}

?>