<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Equipos Controller
 *
 *
 * @method \App\Model\Entity\Equipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EquiposController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $equipos = $this->paginate($this->Equipos);
        
        $this->set(compact('equipos'));
    }

    /**
     * View method
     *
     * @param string|null $id
     *            Equipo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipo = $this->Equipos->get($id, [
            'contain' => []
        ]);
        
        $this->set('equipo', $equipo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipo = $this->Equipos->newEntity();
        if ($this->request->is('post')) {
            $equipo = $this->Equipos->patchEntity($equipo, $this->request->getData());
            if ($this->Equipos->save($equipo)) {
                $this->Flash->success(__('The equipo has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The equipo could not be saved. Please, try again.'));
        }
        $this->set(compact('equipo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id
     *            Equipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipo = $this->Equipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $equipo = $this->Equipos->patchEntity($equipo, $this->request->getData());
            if ($this->Equipos->save($equipo)) {
                $this->Flash->success(__('The equipo has been saved.'));
                
                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->error(__('The equipo could not be saved. Please, try again.'));
        }
        $this->set(compact('equipo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id
     *            Equipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $equipo = $this->Equipos->get($id);
        if ($this->Equipos->delete($equipo)) {
            $this->Flash->success(__('The equipo has been deleted.'));
        } else {
            $this->Flash->error(__('The equipo could not be deleted. Please, try again.'));
        }
        
        return $this->redirect([
            'action' => 'index'
        ]);
    }
}
