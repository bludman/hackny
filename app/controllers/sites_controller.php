<?php
class SitesController extends AppController {

	var $name = 'Sites';
	var $components = array('Email');
	var $helpers = array('Html');

	function index() {
		$this->Site->recursive = 0;
		$this->set('sites', $this->paginate());
	}

	function view($id = null, $key=null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid site', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('site', $this->Site->read(null, $id));
		$this->set('editMode', $this->Site->data["Site"]["edit_key"] == $key);
		if($this->Site->data["Site"]["edit_key"] == $key)
		{
			//debug("Admin perm");
			$this->redirect(array('action' => 'edit',$id));
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
				$this->Session->setFlash(__('The site has been saved', true));
								
				
				$this->Email->from    = 'Ben <bludman@gmail.com>';
				$this->Email->to      = $this->data["Site"]["owner_email"];
				$this->Email->subject = 'you key';
				$this->Email->send($this->data["Site"]["edit_key"]);

				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
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