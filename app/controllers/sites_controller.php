<?php
class SitesController extends AppController {

	var $name = 'Sites';
	var $components = array('Email');
	var $helpers = array('Html','Javascript');

	function index() {
		$this->Site->recursive = 0;
		$this->set('sites', $this->paginate());
	}

	function view($id = null, $key = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid site', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('site', $this->Site->read(null, $id));
		$this->set('editMode', $this->Site->data["Site"]["edit_key"] == $key);
		if($this->Site->data["Site"]["edit_key"] == $key)
		{
			//debug("Admin perm");
			$this->redirect(array('action' => 'edit',$id, $key));
		}
		else
		{
			//debug("User perm only");
			$this->layout = 'site_default';
		}
	}
	

	function add() {
		if (!empty($this->data)) {
			$this->Site->create();
			$this->data["Site"]["edit_key"]=md5(time().$this->data["Site"]["name"]);
					
			if ($this->Site->save($this->data)) {
			//The bit.ly 
			//FIXME:Grab Location Dynamic
      $url_string = "http://www.hackny.com" . $this->base . "/Sites/view/" . $this->Site->getLastInsertId() . "/";
      ini_get('allow_url_fopen');
      $content = file_get_contents('http://api.bit.ly/v3/shorten?login=epkatz&apiKey=R_7ff58887495e8fecb8f0009651a30da3&longUrl='.$url_string.'&format=txt');
      $this->data["Site"]["short_url"] = $content;
        if ($this->Site->save($this->data)){
          $this->Session->setFlash(__('The site has been saved', true));
          $this->redirect(array('action' => 'index'));
        }
        
				/*$this->Email->from    = 'Ben <bludman@gmail.com>';
								$this->Email->to      = $this->data["Site"]["owner_email"];
								$this->Email->subject = 'you key';
								$this->Email->send($this->data["Site"]["edit_key"]);*/

			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null, $key = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid site', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Site->save($this->data)) {
				$this->Session->setFlash(__('The site has been saved', true));
				//$this->redirect(array('action' => 'index'));
				$this->redirect(array('action' => 'edit',$id,$key));
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.', true));
			}
		}
		
	    $this->Site->read(null, $id);
	    if (!($this->Site->data["Site"]["edit_key"] == $key)){
	    	$this->Session->setFlash(__('Invalid edit key', true));
	      $this->redirect(array('controller' => 'pages' ,'action' => 'index'));
	    }
	    
		if (empty($this->data)) {
			$this->data = $this->Site->read(null, $id);
			//debug($this->data["Link"]);
			$this->set('links',$this->data["Link"]);
			$this->layout = 'site_default';
		}
		
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for site', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Site->delete($id)) {
			$this->Session->setFlash(__('Site deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Site was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Site->recursive = 0;
		$this->set('sites', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid site', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('site', $this->Site->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Site->create();
			if ($this->Site->save($this->data)) {
				$this->Session->setFlash(__('The site has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid site', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Site->save($this->data)) {
				$this->Session->setFlash(__('The site has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Site->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for site', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Site->delete($id)) {
			$this->Session->setFlash(__('Site deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Site was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>