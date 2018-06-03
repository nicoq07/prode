<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GruposUsuarios Controller
 *
 *
 * @method \App\Model\Entity\GruposUsuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GruposUsuariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $gruposUsuarios = $this->paginate($this->GruposUsuarios);
        
        $this->set(compact('gruposUsuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id
     *            Grupos Usuario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gruposUsuario = $this->GruposUsuarios->get($id, [
            'contain' => []
        ]);
        
        $this->set('gruposUsuario', $gruposUsuario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gruposUsuario = $this->GruposUsuarios->newEntity();
        if ($this->request->is('post')) {
            $gruposUsuario = $this->GruposUsuarios->patchEntity($gruposUsuario, $this->request->getData());
            if ($this->GruposUsuarios->save($gruposUsuario)) {
                $this->Flash->success(__('The grupos usuario has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The grupos usuario could not be saved. Please, try again.'));
        }
        $this->set(compact('gruposUsuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id
     *            Grupos Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gruposUsuario = $this->GruposUsuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $gruposUsuario = $this->GruposUsuarios->patchEntity($gruposUsuario, $this->request->getData());
            if ($this->GruposUsuarios->save($gruposUsuario)) {
                $this->Flash->success(__('The grupos usuario has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The grupos usuario could not be saved. Please, try again.'));
        }
        $this->set(compact('gruposUsuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id
     *            Grupos Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $gruposUsuario = $this->GruposUsuarios->get($id);
        if ($this->GruposUsuarios->delete($gruposUsuario)) {
            $this->Flash->success(__('The grupos usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The grupos usuario could not be deleted. Please, try again.'));
        }
        
        return $this->redirect([
            'action' => 'index'
        ]);
    }
}
