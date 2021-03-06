<?php
App::uses('AppController', 'Controller');
/**
 * Tipos Controller
 *
 * @property Tipo $Tipo
 * @property PaginatorComponent $Paginator
 */
class TiposController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	//public $helpers = array('Session', 'Html', 'Js', 'Time');


	public function beforeRender() {
	    parent::beforeRender();

	    $this->layout = 'admin';
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Tipo->recursive = 0;
		$this->set('tipos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Tipo->exists($id)) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		$options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
		$this->set('tipo', $this->Tipo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Tipo->create();
			if ($this->Tipo->save($this->request->data)) {
				$this->Flash->success(__('The tipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The tipo could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Tipo->exists($id)) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipo->save($this->request->data)) {
				$this->Flash->success(__('The tipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The tipo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
			$this->request->data = $this->Tipo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Tipo->id = $id;
		if (!$this->Tipo->exists()) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Tipo->delete()) {
			$this->Flash->success(__('The tipo has been deleted.'));
		} else {
			$this->Flash->error(__('The tipo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
